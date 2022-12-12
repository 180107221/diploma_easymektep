using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace EasyMektep.Models.Projects
{
    public class CourseCardModel
    {
        public int Id { get; set; }
        public string Title { get; set; }
        public string ImgUrl { get; set; }
        public string Teacher { get; set; }
    }
}
