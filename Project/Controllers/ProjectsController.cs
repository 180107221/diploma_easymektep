using EasyMektep.Interfaces;
using Microsoft.AspNetCore.Authorization;
using Microsoft.AspNetCore.Http;
using Microsoft.AspNetCore.Mvc;
using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Threading.Tasks;

namespace EasyMektep.Controllers
{
    [Authorize]
    public class ProjectsController : Controller
    {
        private readonly IProjectInterface _repository;
        public ProjectsController(IProjectInterface repository)
        {
            this._repository = repository;
        }
        [HttpGet]
        public IActionResult Index()
        {
            ViewBag.LastOpened = _repository.GetLastOpened(User.FindFirst(System.Security.Claims.ClaimTypes.NameIdentifier).Value);
            ViewBag.NewCourses = _repository.GetNewCourses(User.FindFirst(System.Security.Claims.ClaimTypes.NameIdentifier).Value);
            ViewBag.AllCourses = _repository.GetAllCourses(User.FindFirst(System.Security.Claims.ClaimTypes.NameIdentifier).Value);
            return View();
        }
        [HttpPost]
        public void Complete(int id)
        {
            _repository.Complete(User.FindFirst(System.Security.Claims.ClaimTypes.NameIdentifier).Value, id);
        }
        [HttpPost]
        public void Delete(int id)
        {
            _repository.Delete(User.FindFirst(System.Security.Claims.ClaimTypes.NameIdentifier).Value, id);
        }
        [HttpGet]
        public IActionResult Course(int id)
        {
            return View(_repository.GetCourse(User.FindFirst(System.Security.Claims.ClaimTypes.NameIdentifier).Value, id));
        }
        [HttpGet]
        public IActionResult Assignment(int id)
        {
            return View(_repository.GetAssignment(User.FindFirst(System.Security.Claims.ClaimTypes.NameIdentifier).Value, id));
        }
        [HttpPost]
        public void CompleteAssignment(int id)
        {
            _repository.CompleteAssignment(User.FindFirst(System.Security.Claims.ClaimTypes.NameIdentifier).Value, id);
        }
        [HttpPost]
        public void DeleteAssignment(int id)
        {
            _repository.DeleteAssignment(User.FindFirst(System.Security.Claims.ClaimTypes.NameIdentifier).Value, id);
        }
        [HttpPost]
        public IActionResult Add(int id, string yourId, string description, List<IFormFile> files, List<string> fname)
        {
            List<IFormFile> currentFiles = new List<IFormFile>();
            List<string> filesName = new List<string>();
            foreach (IFormFile file in files)
            {
                if(fname.Contains(file.FileName))
                {
                    currentFiles.Add(file);
                }
            }
            string path = Path.Combine(Directory.GetCurrentDirectory(), "wwwroot/Files");
            //create folder if not exist
            if (!Directory.Exists(path))
                Directory.CreateDirectory(path);
            //get file extension
            foreach (var file in currentFiles)
            {
                FileInfo fileInfo = new FileInfo(file.FileName);
                string fileName = file.FileName + fileInfo.Extension;

                string fileNameWithPath = Path.Combine(path, fileName);

                using (var stream = new FileStream(fileNameWithPath, FileMode.Create))
                {
                    file.CopyTo(stream);
                }
                filesName.Add(file.FileName);
            }

            _repository.AddAssignment(User.FindFirst(System.Security.Claims.ClaimTypes.NameIdentifier).Value, id, yourId, description, filesName);
            return RedirectToAction("Assignment", new { id=id });
        }
    }
}
