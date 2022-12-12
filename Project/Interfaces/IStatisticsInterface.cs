using EasyMektep.Models.Statistics;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace EasyMektep.Interfaces
{
    public interface IStatisticsInterface
    {
        StatisticsModel GetStatistics(string userIdentifier, DateTime? startDate, DateTime? endDate);
    }
}
