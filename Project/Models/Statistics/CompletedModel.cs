using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace EasyMektep.Models.Statistics
{
    public class CompletedModel
    {
        public string Range { get; set; }
        public int Completed { get; set; }
        public int Uncompleted { get; set; }
    }
}
