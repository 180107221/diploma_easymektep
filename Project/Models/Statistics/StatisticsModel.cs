using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace EasyMektep.Models.Statistics
{
    public class StatisticsModel
    {
        public List<PlagiarismModel> Plagiarisms { get; set; }
        public List<CompletedModel> Completed { get; set; }
        public ProgressModel Progress { get; set; }
        public List<NumberCompletedModel> TopLine { get; set; }
        public List<NumberCompletedModel> BottomLine { get; set; }

    }
}
