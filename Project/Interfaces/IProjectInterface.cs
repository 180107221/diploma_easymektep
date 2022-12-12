using EasyMektep.Models.Projects;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace EasyMektep.Interfaces
{
    public interface IProjectInterface
    {
        List<CourseCardModel> GetLastOpened(string userIdentifier);
        List<CourseCardModel> GetNewCourses(string userIdentifier);
        List<CourseCardModel> GetAllCourses(string userIdentifier);
        void Complete(string userIdentifier, int id);
        void Delete(string userIdentifier, int id);
        CourseModel GetCourse(string userIdentifier, int id);
        void CompleteAssignment(string userIdentifier, int id);
        void DeleteAssignment(string userIdentifier, int id);
        AssignmentCardModel GetAssignment(string userIdentifier, int id);
        void AddAssignment(string userIdentifier, int id, string yourId, string description, List<string> files);
    }
}
