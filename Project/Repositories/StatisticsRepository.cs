using EasyMektep.Interfaces;
using EasyMektep.Models.Statistics;
using Newtonsoft.Json;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace EasyMektep.Repositories
{
    public class StatisticsRepository : IStatisticsInterface
    {
        public StatisticsModel GetStatistics(string userIdentifier, DateTime? startDate, DateTime? endDate)
        {
            StatisticsModel model = new StatisticsModel();
            string example = "{ \"Progress\":{ \"Progress\":83, \"Remaining\":23, \"TimeSpent\":113 }, \"Completed\":[ { \"Range\":\"Total\", \"Completed\":86, \"Uncompleted\":14 }, { \"Range\":\"Month\", \"Completed\":30, \"Uncompleted\":70 } ], \"Plagiarisms\":[ { \"Range\":\"All time\", \"Low\":87, \"Medium\":10, \"High\":3 }, { \"Range\":\"Month\", \"Low\":70, \"Medium\":20, \"High\":10 }, { \"Range\":\"Year\", \"Low\":83, \"Medium\":12, \"High\":5 } ], \"TopLine\":[ { \"Date\":\"2022 - 01 - 31\", \"Number\":53 }, { \"Date\":\"2022 - 02 - 01\", \"Number\":30 }, { \"Date\":\"2022 - 02 - 02\", \"Number\":10 }, { \"Date\":\"2022 - 02 - 03\", \"Number\":68 }, { \"Date\":\"2022 - 02 - 04\", \"Number\":33 }, { \"Date\":\"2022 - 02 - 05\", \"Number\":65 }, { \"Date\":\"2022 - 02 - 06\", \"Number\":35 } ], \"BottomLine\":[ { \"Date\":\"2022 - 01 - 31\", \"Number\":33 }, { \"Date\":\"2022 - 02 - 01\", \"Number\":10 }, { \"Date\":\"2022 - 02 - 02\", \"Number\":10 }, { \"Date\":\"2022 - 02 - 03\", \"Number\":48 }, { \"Date\":\"2022 - 02 - 04\", \"Number\":13 }, { \"Date\":\"2022 - 02 - 05\", \"Number\":45 }, { \"Date\":\"2022 - 02 - 06\", \"Number\":15 } ] }";
            model = JsonConvert.DeserializeObject<StatisticsModel>(example);
            return model;
        }
    }
}
