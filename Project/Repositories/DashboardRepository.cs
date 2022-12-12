using EasyMektep.Interfaces;
using EasyMektep.Models.Dashboard;
using Newtonsoft.Json;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace EasyMektep.Repositories
{
    public class DashboardRepository : IDashboardInterface
    {
        public DashboardModel GetDashboard(string userIdentifier, DateTime? startDate, DateTime? endDate)
        {
            DashboardModel model = new DashboardModel();
            string example = "{ \"Banners\":[ { \"Id\":1, \"Title\":\"Top 5 books for <br/> self - development\", \"Description\":\"British scientists have found out that in order to develop yourself you need to read a lot of books and here are collected books for you\", \"ButtonName\": \"More\", \"ButtonUrl\":\" / Projects / Index\", \"ImgUrl\":\"/img//BannerFirst.svg\" }, { \"Id\":2, \"Title\":\"Test 2 banner <br/> add banner\", \"Description\":\"British scientists have found out that in order to develop yourself you need to read a lot of books and here are collected books for you\", \"ButtonName\": \"More2\", \"ButtonUrl\":\" / Statistics / Index\", \"ImgUrl\":\"/img//course1.svg\" }, { \"Id\":3, \"Title\":\"Test 3 banner <br/> add banner\", \"Description\":\"British scientists have found out that in order to develop yourself you need to read a lot of books and here are collected books for you\", \"ButtonName\": \"More3\", \"ButtonUrl\":\" / Timer / Index\", \"ImgUrl\":\"/img//course2.svg\" }, { \"Id\":4, \"Title\":\"Test 3 banner <br/> add banner\", \"Description\":\"British scientists have found out that in order to develop yourself you need to read a lot of books and here are collected books for you\", \"ButtonName\": \"More4\", \"ButtonUrl\":\" / Timer / Index\", \"ImgUrl\":\"/img//course3.svg\" }, { \"Id\":5, \"Title\":\"Test 5 banner <br/> add banner\", \"Description\":\"British scientists have found out that in order to develop yourself you need to read a lot of books and here are collected books for you\", \"ButtonName\": \"More\", \"ButtonUrl\":\" / Timer / Index\", \"ImgUrl\":\"/img//BannerFirst.svg\" } ], \"Completed\":[ { \"Range\":\"Total\", \"Completed\":86, \"Uncompleted\":14 }, { \"Range\":\"Month\", \"Completed\":30, \"Uncompleted\":70 } ], \"TotalCompleted\": [ { \"Date\": \"2022 - 01 - 31\", \"Number\": 53 }, { \"Date\": \"2022 - 02 - 01\", \"Number\": 30 }, { \"Date\": \"2022 - 02 - 02\", \"Number\": 10 }, { \"Date\": \"2022 - 02 - 03\", \"Number\": 68 }, { \"Date\": \"2022 - 02 - 04\", \"Number\": 33 }, { \"Date\": \"2022 - 02 - 05\", \"Number\": 65 }, { \"Date\": \"2022 - 02 - 06\", \"Number\": 35 } ], \"NewCompleted\": [ { \"Date\": \"2022 - 01 - 31\", \"Number\": 33 }, { \"Date\": \"2022 - 02 - 01\", \"Number\": 10 }, { \"Date\": \"2022 - 02 - 02\", \"Number\": 10 }, { \"Date\": \"2022 - 02 - 03\", \"Number\": 48 }, { \"Date\": \"2022 - 02 - 04\", \"Number\": 13 }, { \"Date\": \"2022 - 02 - 05\", \"Number\": 45 }, { \"Date\": \"2022 - 02 - 06\", \"Number\": 15 } ], \"Courses\":[ { \"Id\":1, \"Title\":\"Math for Computer Science\", \"ImgUrl\":\"/img/course1.svg\", \"Teacher\":\"Maria Nemchenko\" }, { \"Id\":2, \"Title\":\"Math for Computer Science\", \"ImgUrl\":\"/img/course2.svg\", \"Teacher\":\"Maria Nemchenko\" }, { \"Id\":3, \"Title\":\"Math for Computer Science\", \"ImgUrl\":\"/img/course3.svg\", \"Teacher\":\"Maria Nemchenko\" } ] }";
            model = JsonConvert.DeserializeObject<DashboardModel>(example);                               
            return model;
        }
    }
}
