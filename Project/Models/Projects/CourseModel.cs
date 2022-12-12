using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace EasyMektep.Models.Projects
{
    public class CourseModel
    {
        public string Title { get; set; }
        public List<string> Description { get; set; }
        public List<ForumModel> Forums { get; set; }
        public List<AssignmentModel> Assignments { get; set; }
    }
    public class ForumModel
    {
        public int Id { get; set; }
        public string Title { get; set; }
        public string Description { get; set; }
        public string ImgUrl { get; set; }
    }
    public class AssignmentModel
    {
        public int Id { get; set; }
        public string Title { get; set; }
        public string Status { get; set; }
        public DateTime Date { get; set; }
        public int Progress { get; set; }
    }
}
