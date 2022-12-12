using EasyMektep.Models.Account;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace EasyMektep.Interfaces
{
    public interface IAccountInterface
    {
        public UserModel Login(string login, string password);
        public void Register(UserModel model);
    }
}
