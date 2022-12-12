using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace EasyMektep.Models.Account
{
    public class UserModel
    {
        public int          Id          { get; set; }
        public string       Name        { get; set; }
        public string       Surname     { get; set; }
        public string       Email       { get; set; }
        public DateTime     BirthDay    { get; set; }
        public int          Gender      { get; set; }
        public string       PhoneNumber { get; set; }
        public string       ImgUrl      { get; set; }
        public string       Password    { get; set; }
    }
}
