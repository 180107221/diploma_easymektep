using EasyMektep.Interfaces;
using EasyMektep.Models.Projects;
using Newtonsoft.Json;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace EasyMektep.Repositories
{
    public class ProjectRepository : IProjectInterface
    {
        public List<CourseCardModel> GetLastOpened(string userIdentifier)
        {
            List<CourseCardModel> model = new List<CourseCardModel>();
            model.Add(new CourseCardModel
            {
                Id=1,
                Title = "Math for Computer Science",
                ImgUrl = "/img/course1.svg",
                Teacher = "Maria Nemchenko"
            }
            );
            model.Add(new CourseCardModel
            {
                Id = 2,
                Title = "Math for Computer Science",
                ImgUrl = "/img/course2.svg",
                Teacher = "Maria Nemchenko"
            }
            );
            model.Add(new CourseCardModel
            {
                Id = 3,
                Title = "Math for Computer Science",
                ImgUrl = "/img/course3.svg",
                Teacher = "Maria Nemchenko"
            }
            );
            return model;
        }
        public List<CourseCardModel> GetNewCourses(string userIdentifier)
        {
            List<CourseCardModel> model = new List<CourseCardModel>();
            model.Add(new CourseCardModel
            {
                Id = 4,
                Title = "Math for Computer Science",
                ImgUrl = "/img/course1.svg",
                Teacher = "Maria Nemchenko"
            }
            );
            model.Add(new CourseCardModel
            {
                Id = 5,
                Title = "Math for Computer Science",
                ImgUrl = "/img/course2.svg",
                Teacher = "Maria Nemchenko"
            }
            );
            model.Add(new CourseCardModel
            {
                Id = 6,
                Title = "Math for Computer Science",
                ImgUrl = "/img/course3.svg",
                Teacher = "Maria Nemchenko"
            }
            );
            return model;
        }

        public List<CourseCardModel> GetAllCourses(string userIdentifier)
        {
            List<CourseCardModel> model = new List<CourseCardModel>();
            model.Add(new CourseCardModel
            {
                Id = 1,
                Title = "Math for Computer Science",
                ImgUrl = "/img/course1.svg",
                Teacher = "Maria Nemchenko"
            }
            );
            model.Add(new CourseCardModel
            {
                Id = 2,
                Title = "Math for Computer Science",
                ImgUrl = "/img/course2.svg",
                Teacher = "Maria Nemchenko"
            }
            );
            model.Add(new CourseCardModel
            {
                Id = 3,
                Title = "Math for Computer Science",
                ImgUrl = "/img/course3.svg",
                Teacher = "Maria Nemchenko"
            }
            );
            return model;
        }
        public void Complete(string userIdentifier, int id)
        {

        }
        public void Delete(string userIdentifier, int id)
        {

        }
        public CourseModel GetCourse(string userIdentifier, int id)
        {
            CourseModel model = new CourseModel();
            string example = "{ \"Title\":\"Python\", \"Description\":[ \"Python is a general-purpose, versatile, and powerful programming language. It’s a great first language because it’s concise and easy to read. Whatever you want to do, Python can do it. From web development to machine learning to data science, Python is the language for you.\", \"Why we love it:<br> ⋅ Great first language<br> ⋅ Large programming community<br> ⋅ Excellent online documentation<br> ⋅ Endless libraries and packages<br> ⋅ World-wide popularity<br> ⋅ Powerful and flexible\", \"Python is a general-purpose, versatile, and powerful programming language. It’s a great first language because it’s concise and easy to read. Whatever you want to do, Python can do it. From web development to machine learning to data science, Python is the language for you.\" ], \"Forums\" : [ { \"Id\":1, \"Title\":\"FORUM\", \"Description\":\"Python 3 Codecademy Forums\", \"ImgUrl\":\"/img/forum1.svg\" }, { \"Id\":2, \"Title\":\"FORUM\", \"Description\":\"Python 3 Codecademy Forums\", \"ImgUrl\":\"/img/forum2.svg\" }, { \"Id\":3, \"Title\":\"FORUM\", \"Description\":\"Python 3 Codecademy Forums\", \"ImgUrl\":\"/img/forum3.svg\" } ], \"Assignments\":[ { \"Id\":1, \"Title\":\"Do assignment 1\", \"Status\":\"in progress\", \"Progress\":25, \"Date\":\"2022.11.12 00:00\" }, { \"Id\":2, \"Title\":\"Do assignment 1\", \"Status\":\"done\", \"Progress\":25, \"Date\":\"2022.11.12 00:00\" }, { \"Id\":3, \"Title\":\"Do assignment 1\", \"Status\":\"time is up\", \"Progress\":25, \"Date\":\"2022.11.12 00:00\" }, { \"Id\":4, \"Title\":\"Do assignment 1\", \"Status\":\"in progress\", \"Progress\":25, \"Date\":\"2022.11.12 00:00\" }, { \"Id\":5, \"Title\":\"Do assignment 1\", \"Status\":\"done\", \"Progress\":25, \"Date\":\"2022.11.12 00:00\" }, { \"Id\":6, \"Title\":\"Do assignment 1\", \"Status\":\"done\", \"Progress\":25, \"Date\":\"2022.11.12 00:00\" } ] }";
            model = JsonConvert.DeserializeObject<CourseModel>(example);
            return model;
        }
        public void CompleteAssignment(string userIdentifier, int id)
        {

        }
        public void DeleteAssignment(string userIdentifier, int id)
        {

        }
        public AssignmentCardModel GetAssignment(string userIdentifier, int id)
        {
            AssignmentCardModel model = new AssignmentCardModel();
            string example;
            if (id==1)
            example = "{ \"Id\":1,\"Title\":\"Assignment 1\", \"Date\":\"2022.02.01 11:30\", \"Description\":\"In this assignment I'd like you to experiment with a variety of imagemaking techniques to create a range of images of a single household object. This assignment is graded, and it will also help you towards completing the optional peer review assignment at the end of this week, Brief 1.2: Making Images, Making Meaning. <br><br>Choose a household object. Choose something that comes in different varieties, something that isn’t too visually complicated, or too simple, and something that is easily recognizable.<br><br>Make at least 10 images of your object. Make each image with different techniques, and in a different way. Make them all approximately the same size, 5 x 5 inches, each in the middle of an 8.5 x 11” or A4 (vertical) sheet of paper. If you make your images by hand, please scan them at 300ppi at 100% of size.<br><br>Choose your 10 best images and bundle them into one PDF document for upload. Please submit 10 and only 10.<br><br>Please include a title for your assignment, and submit! After submitting, you will be prompted to review two of your peers’ assignments. Good luck!\", \"Submission\" : \"In this assignment I'd like you to experiment with a variety of imagemaking techniques to create a range of images of a single household object.This assignment is graded, and it will also help you towards completing the optional peer review assignment at the end of this week, Brief 1.2: Making Images, Making Meaning. \", \"UrlItems\":[ \"/items/dogBoy.jpg\", \"/items/dogGirl.jpg\" ] }";
            else
                example = "{ \"Id\":2,\"Title\":\"Assignment 1\", \"Date\":\"2022.02.01 11:30\", \"Description\":\"In this assignment I'd like you to experiment with a variety of imagemaking techniques to create a range of images of a single household object. This assignment is graded, and it will also help you towards completing the optional peer review assignment at the end of this week, Brief 1.2: Making Images, Making Meaning. <br><br>Choose a household object. Choose something that comes in different varieties, something that isn’t too visually complicated, or too simple, and something that is easily recognizable.<br><br>Make at least 10 images of your object. Make each image with different techniques, and in a different way. Make them all approximately the same size, 5 x 5 inches, each in the middle of an 8.5 x 11” or A4 (vertical) sheet of paper. If you make your images by hand, please scan them at 300ppi at 100% of size.<br><br>Choose your 10 best images and bundle them into one PDF document for upload. Please submit 10 and only 10.<br><br>Please include a title for your assignment, and submit! After submitting, you will be prompted to review two of your peers’ assignments. Good luck!\", \"Submission\" : \"In this assignment I'd like you to experiment with a variety of imagemaking techniques to create a range of images of a single household object.This assignment is graded, and it will also help you towards completing the optional peer review assignment at the end of this week, Brief 1.2: Making Images, Making Meaning. \" }";
            model = JsonConvert.DeserializeObject<AssignmentCardModel>(example);
            return model;
        }
        public void AddAssignment(string userIdentifier, int id, string yourId, string description, List<string> files)
        {
        }
    }
}
