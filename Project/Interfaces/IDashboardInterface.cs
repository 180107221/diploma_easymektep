using EasyMektep.Models.Dashboard;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace EasyMektep.Interfaces
{
    public interface IDashboardInterface
    {
        DashboardModel GetDashboard(string userIdentifier, DateTime? startDate, DateTime? endDate);
    }
}
