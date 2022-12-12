using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace EasyMektep.Models.Projects
{
    public class AssignmentCardModel
    {
        public int Id { get; set; }
        public string Title { get; set; }
        public string Description { get; set; }
        public DateTime Date { get; set; }
        public string Submission { get; set; }
        public List<string> UrlItems { get; set; }
    }
}
