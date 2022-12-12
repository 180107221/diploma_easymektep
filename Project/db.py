import shutil
import MySQLdb
import os
from sklearn.feature_extraction.text import TfidfVectorizer
from sklearn.metrics.pairwise import cosine_similarity
from datetime import datetime

hostname = 'localhost'
username = 'root'
password = ''
database = 'diploma'
myConnection = MySQLdb.connect(host=hostname, user=username, passwd=password, db=database)

student_files = []
file_id = []
file_name = []
file_type = []
directory = "Plagiarism"
plagiarism_data = "Plagiarism_Result"

parent_dir = "C:/"
path = os.path.join(parent_dir, directory)
path_result = os.path.join(parent_dir, plagiarism_data)

def write_file(data, filename):
    with open(filename, 'wb') as file:
        file.write(data)

cur = myConnection.cursor()
sql = "SELECT * FROM project;"
cur.execute(sql)


try:
    os.mkdir(path)
    os.mkdir(path_result)
except OSError as error:
    print(error)
for al in cur.fetchall():
    with open("C:/Plagiarism/"+str(al[0])+"_"+al[1][0:10]+"."+al[8], 'wb') as f:
        student_files.append("C:/Plagiarism/"+str(al[0])+"_"+al[1][0:10]+"."+al[8])
        f.write(al[7])
    print(al[3])

student_notes =[open(File,errors="ignore").read() for File in  student_files]

vectorize = lambda Text: TfidfVectorizer().fit_transform(Text).toarray()
similarity = lambda doc1, doc2: cosine_similarity([doc1, doc2])

vectors = vectorize(student_notes)
s_vectors = list(zip(student_files, vectors))

def check_plagiarism():
    plagiarism_results = set()
    global s_vectors
    for student_a, text_vector_a in s_vectors:
        new_vectors =s_vectors.copy()
        current_index = new_vectors.index((student_a, text_vector_a))
        del new_vectors[current_index]
        for student_b , text_vector_b in new_vectors:
            sim_score = similarity(text_vector_a, text_vector_b)[0][1]
            student_pair = sorted((student_a, student_b))
            score = (student_pair[0], student_pair[1],"%.2f" % (sim_score*100))
            plagiarism_results.add(score)
    return sorted(plagiarism_results)

for data in check_plagiarism():
    d1 = data[0].replace('C:/Plagiarism/', '')
    d2 = data[1].replace('C:/Plagiarism/', '')
    d11 = d1.split("_")
    d12 = d11[1].split(".")
    d21 = d2.split("_")
    d22 = d21[1].split(".")
    file_id.append(d11)
    file_name.append(d21)
    file_type.append(data[2])
    sql = "UPDATE `project` SET `plagiarism_statistics` = IF( `plagiarism_statistics` < {0} , {1} , `plagiarism_statistics`) WHERE `id` = {2}".format(float(data[2]),float(data[2]),int(d21[0]))
    sql1= "UPDATE `project` SET `plagiarism_statistics` = IF( `plagiarism_statistics` < {0} , {1} , `plagiarism_statistics`) WHERE `id` = {2}".format(float(data[2]), float(data[2]), int(d11[0]))
    val = (data[2],data[2],d11[0])
    cur.execute(sql)
    cur.execute(sql1)

today = datetime.now()
time_now = today.strftime('%Y_%m_%d_%H_%M_%S')

with open('C:/Plagiarism_Result/Result_'+str(time_now)+".txt", 'w') as f:
    f.write("Compared two files result:  \n")
    for x in range(len(file_id)):
        f.write("File_1: " + str(file_id[x][0]) + "_" + file_id[x][1] + " and File_2: " + str(file_name[x][0]) + "_" + file_name[x][1] + " Result: " + file_type[x] + "\n")

shutil.rmtree(path)
myConnection.commit()
myConnection.close()
