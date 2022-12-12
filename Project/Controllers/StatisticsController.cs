using EasyMektep.Interfaces;
using EasyMektep.Models.Statistics;
using Microsoft.AspNetCore.Authorization;
using Microsoft.AspNetCore.Mvc;
using System;
using System.Collections.Generic;
using System.Globalization;
using System.Linq;
using System.Threading.Tasks;

namespace EasyMektep.Controllers
{
    [Authorize]
    public class StatisticsController : Controller
    {
        private readonly IStatisticsInterface _repository;
        public StatisticsController(IStatisticsInterface repository)
        {
            this._repository = repository;
        }
        public IActionResult Index(DateTime? startDate, DateTime? endDate)
        {
            StatisticsModel model = new StatisticsModel();
            if(startDate==null)
            {
                ViewBag.StartDate = (new DateTime(2022, 2, 1)).ToString("dd MMM. yyyy", CultureInfo.CreateSpecificCulture("en-US"));
                ViewBag.EndDate = (new DateTime(2022, 6, 1)).ToString("dd MMM. yyyy", CultureInfo.CreateSpecificCulture("en-US"));
            }
            else
            {
                ViewBag.StartDate = startDate.Value.ToString("dd MMM. yyyy", CultureInfo.CreateSpecificCulture("en-US"));
                ViewBag.EndDate = endDate.Value.ToString("dd MMM. yyyy", CultureInfo.CreateSpecificCulture("en-US"));
            }
            model = _repository.GetStatistics(User.FindFirst(System.Security.Claims.ClaimTypes.NameIdentifier).Value, startDate, endDate);
            return View(model);
        }
    }
}
