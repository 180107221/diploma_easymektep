from tkinter import *
import tkinter.messagebox
import MySQLdb
import shutil
import os
from sklearn.feature_extraction.text import TfidfVectorizer
from sklearn.metrics.pairwise import cosine_similarity
from datetime import datetime

hostname = 'localhost'
username = 'root'
password = ''
database = 'diploma'

# connecting to the database
myConnection = MySQLdb.connect(host=hostname, user=username, passwd=password, db=database)
cursordb = myConnection.cursor()

global root
global s_vectors

root = Tk()
root.config(bg="white")
root.title("Plagiarism System")
root.geometry("500x500")

def login():
    global root2


    root2 = Toplevel(root)
    root2.title("Account Login")
    root2.geometry("450x300")
    root2.config(bg="white")

    global username_verification
    global password_verification
    Label(root2, text='Please Enter your Account Details', bd=5, font=('arial', 12, 'bold'), relief="groove", fg="white",
        bg="blue", width=300).pack()
    username_verification = StringVar()
    password_verification = StringVar()
    Label(root2, text="").pack()
    Label(root2, text="Username :", fg="black", font=('arial', 12, 'bold')).pack()
    Entry(root2, textvariable=username_verification).pack()
    Label(root2, text="").pack()
    Label(root2, text="Password :", fg="black", font=('arial', 12, 'bold')).pack()
    Entry(root2, textvariable=password_verification, show="*").pack()
    Label(root2, text="").pack()
    Button(root2, text="Login", bg="blue", fg='white', relief="groove", font=('arial', 12, 'bold'),
       command=login_verification).pack()
    Label(root2, text="")


def logged_destroy():
    logged_message.destroy()


    root2.destroy()


def failed_destroy():
    failed_message.destroy()


def logged(results):
    global logged_message


    logged_message = Toplevel(root2)
    logged_message.title("Welcome")
    logged_message.geometry("500x100")
    Label(logged_message, text="Login Successfully!... Welcome {} ".format(results[0][1] + ' ' + results[0][2]), fg="green",
      font="bold").pack()
    Button(logged_message, text="Check Plagiarism", bg="blue", fg='white', relief="groove", font=('arial', 12, 'bold'),
               command=lambda: check_plagiarism(results[0][0])).pack()
    Label(logged_message, text="").pack()
    Button(logged_message, text="Logout", bg="blue", fg='white', relief="groove", font=('arial', 12, 'bold'),
       command=logged_destroy).pack()


def failed():
    global failed_message


    failed_message = Toplevel(root2)
    failed_message.title("Invalid Message")
    failed_message.geometry("500x100")
    Label(failed_message, text="Invalid Username or Password", fg="red", font="bold").pack()
    Label(failed_message, text="").pack()
    Button(failed_message, text="Ok", bg="blue", fg='white', relief="groove", font=('arial', 12, 'bold'),
       command=failed_destroy).pack()


def login_verification():
    user_verification = username_verification.get()


    pass_verification = password_verification.get()
    sql = "select * from teacher where email = %s and password = %s;"
    cursordb.execute(sql, [(user_verification), (pass_verification)])
    results = cursordb.fetchall()
    if results:
        logged(results)

    else:
        failed()
    cursordb.close()

def Exit():
    wayOut = tkinter.messagebox.askyesno("Login System", "Do you want to exit the system")


    if (wayOut):
        root.destroy()
    return


def main_display():

    Label(root, text='Welcome to Log In System', bd=20, font=('arial', 20, 'bold'), relief="groove", fg="white",
      bg="blue", width=300).pack()
    Label(root, text="").pack()
    Button(root, text='Log In', height="1", width="20", bd=8, font=('arial', 12, 'bold'), relief="groove", fg="white",
       bg="blue", command=login).pack()
    Label(root, text="").pack()
    Button(root, text='Exit', height="1", width="20", bd=8, font=('arial', 12, 'bold'), relief="groove", fg="white",
       bg="blue", command=Exit).pack()
    Label(root, text="").pack()

def check_plagiarism(teacher_id):
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
    sql = "SELECT * FROM project WHERE teacher_id = {0};".format(int(teacher_id))
    cur.execute(sql)

    try:
        os.mkdir(path)
        os.mkdir(path_result)
    except OSError as error:
        print(error)
    for al in cur.fetchall():
        with open("C:/Plagiarism/" + str(al[0]) + "_" + al[1][0:10] + "." + al[8], 'wb') as f:
            student_files.append("C:/Plagiarism/" + str(al[0]) + "_" + al[1][0:10] + "." + al[8])
            f.write(al[7])
        print(al[3])

    student_notes = [open(File, errors="ignore").read() for File in student_files]

    vectorize = lambda Text: TfidfVectorizer().fit_transform(Text).toarray()
    similarity = lambda doc1, doc2: cosine_similarity([doc1, doc2])

    vectors = vectorize(student_notes)
    s_vectors = list(zip(student_files, vectors))

    def check_plagiarism():
        plagiarism_results = set()

        for student_a, text_vector_a in s_vectors:
            new_vectors = s_vectors.copy()
            current_index = new_vectors.index((student_a, text_vector_a))
            del new_vectors[current_index]
            for student_b, text_vector_b in new_vectors:
                sim_score = similarity(text_vector_a, text_vector_b)[0][1]
                student_pair = sorted((student_a, student_b))
                score = (student_pair[0], student_pair[1], "%.2f" % (sim_score * 100))
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
        sql = "UPDATE `project` SET `plagiarism_statistics` = IF( `plagiarism_statistics` < {0} , {1} , `plagiarism_statistics`) WHERE `id` = {2}".format(
            float(data[2]), float(data[2]), int(d21[0]))
        sql1 = "UPDATE `project` SET `plagiarism_statistics` = IF( `plagiarism_statistics` < {0} , {1} , `plagiarism_statistics`) WHERE `id` = {2}".format(
            float(data[2]), float(data[2]), int(d11[0]))
        val = (data[2], data[2], d11[0])
        cur.execute(sql)
        cur.execute(sql1)

    today = datetime.now()
    time_now = today.strftime('%Y_%m_%d_%H_%M_%S')

    with open('C:/Plagiarism_Result/Result_' + str(time_now) + ".txt", 'w') as f:
        f.write("Compared two files result:  \n")
        for x in range(len(file_id)):
            f.write(
                "File_1: " + str(file_id[x][0]) + "_" + file_id[x][1] + " and File_2: " + str(file_name[x][0]) + "_" +
                file_name[x][1] + " Result: " + file_type[x] + "\n")

    shutil.rmtree(path)
    cur.close()

main_display()
root.mainloop()
