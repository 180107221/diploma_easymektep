using EasyMektep.Models.Account;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace EasyMektep.Interfaces
{
    public interface ISettingInterface
    {
        void Change(UserModel model);
        void ChangePassword(string newPass, string repeatPass, string old);
    }
}
