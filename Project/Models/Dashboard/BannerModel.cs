using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace EasyMektep.Models.Dashboard
{
    public class BannerModel
    {
        public int Id { get; set; }
        public string Title { get; set; }
        public string Description { get; set; }
        public string ButtonName { get; set; }
        public string ButtonUrl { get; set; }
        public string ImgUrl { get; set; }
    }
}
