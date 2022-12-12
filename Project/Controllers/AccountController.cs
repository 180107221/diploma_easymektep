using EasyMektep.Interfaces;
using EasyMektep.Models.Account;
using Microsoft.AspNetCore.Authentication;
using Microsoft.AspNetCore.Authentication.Cookies;
using Microsoft.AspNetCore.Mvc;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Security.Claims;
using System.Threading.Tasks;

namespace EasyMektep.Controllers
{
    public class AccountController : Controller
    {
        private readonly IAccountInterface _repository;
        public AccountController(IAccountInterface repository)
        {
            this._repository = repository;
        }
        public IActionResult Login()
        {
            return View();
        }
        [HttpPost]
        public async Task<IActionResult> Login(string login, string password, string rememberMe)
        {
            if (ModelState.IsValid)
            {
                UserModel profile = _repository.Login(login, password);
                if (profile != null)
                {
                    bool isPersistent = false;
                    if (rememberMe != null)
                        if (rememberMe == "on")
                            isPersistent = true;

                    var identity = new ClaimsIdentity(CookieAuthenticationDefaults.AuthenticationScheme);
                    identity.AddClaim(new Claim(ClaimTypes.IsPersistent, isPersistent.ToString()));
                    identity.AddClaim(new Claim(ClaimTypes.NameIdentifier, profile.Id.ToString()));
                    identity.AddClaim(new Claim(ClaimTypes.Name, profile.Name));
                    identity.AddClaim(new Claim(ClaimTypes.Surname, profile.Surname));
                    identity.AddClaim(new Claim(ClaimTypes.Email, profile.Email));
                    identity.AddClaim(new Claim(ClaimTypes.MobilePhone, profile.PhoneNumber));
                    identity.AddClaim(new Claim(ClaimTypes.DateOfBirth, profile.BirthDay.ToString("dd.MM.yyyy")));
                    identity.AddClaim(new Claim(ClaimTypes.Gender, profile.Gender.ToString()));
                    identity.AddClaim(new Claim(ClaimTypes.Uri, profile.ImgUrl));
                    var principal = new ClaimsPrincipal(identity);
                    
                    await HttpContext.SignInAsync(CookieAuthenticationDefaults.AuthenticationScheme, principal);

                    return this.RedirectToAction("Index", "Dashboard");
                }
                ViewBag.Error = "Неверный логин или пароль!";
            }
            return this.View();
        }
        public IActionResult Register()
        {
            return View();
        }
        [HttpPost]
        public void Register(UserModel model)
        {
            _repository.Register(model);
        }
        public IActionResult Logout()
        {
            HttpContext.SignOutAsync();
            return RedirectToAction("Login");
        }
    }
}
