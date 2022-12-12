using EasyMektep.Interfaces;
using EasyMektep.Models.Account;
using Newtonsoft.Json;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Net.Http;
using System.Text;
using System.Threading.Tasks;

namespace EasyMektep.Repositories
{
    public class AccountRepository : IAccountInterface
    {
        public UserModel Login(string login, string password)
        {
            //необходимо сделать метод для подтверждения валидности
            if (login == "bettycooper@gmail.com" && password == "BettyCooper!!!")
                return new UserModel
                {
                    Id = 1,
                    Name = "Betty",
                    Surname = "Cooper",
                    Email = "bettycooper@gmail.com",
                    BirthDay = new DateTime(1996, 2, 2),
                    PhoneNumber = "+7 777 700 99 99",
                    ImgUrl = "/persons/2.svg",
                    Gender = 1
                };
            else
            {
                using (var httpClient = new HttpClient())
                {
                    var httpResponse =
                            httpClient.GetAsync(Startup._backUrl + "ConfimUser?login=" + login + "&password=" + password).Result;
                    string result = httpResponse.Content.ReadAsStringAsync().Result;
                    return JsonConvert.DeserializeObject<UserModel>(result);
                }
            }
        }
        public void Register(UserModel model)
        {
            using (var httpClient = new HttpClient())
            {                
                var httpContent = new StringContent(JsonConvert.SerializeObject(model), Encoding.UTF8, "application/json");
                var httpResponse = httpClient.PostAsync(Startup._backUrl + "Register", httpContent).Result;
            }
        }
    }
}
