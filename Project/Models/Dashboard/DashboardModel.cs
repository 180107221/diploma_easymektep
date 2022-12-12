using EasyMektep.Models.Projects;
using EasyMektep.Models.Statistics;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace EasyMektep.Models.Dashboard
{
    public class DashboardModel
    {
        public List<BannerModel> Banners { get; set; }
        public List<CompletedModel> Completed { get; set; }
        public List<NumberCompletedModel> TotalCompleted { get; set; }
        public List<NumberCompletedModel> NewCompleted { get; set; }
        public List<CourseCardModel> Courses { get; set; }
    }
}
