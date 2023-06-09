$(document).ready(function()
{
    $("#files").click(function()
    {
      $("#fileinput-button").addClass("fileAtached");
      var Filelist = $("#Filelist").height();
       if($("#Filelist").height() >= 30){
          $("#fileinput-button").addClass("fileAtached");
       }
       else{
        
       }
    });

    $("#filesFooter").click(function()
    {
      $("#fileinput-buttonFooter").addClass("fileAtached");
      var Filelist = $("#FilelistFooter").height();
       if($("#FilelistFooter").height() >= 30){
          $("#fileinput-buttonFooter").addClass("fileAtached");
       }
       else{
        
       }
    });
});


  
	//I added event handler for the file upload control to access the files properties.
document.addEventListener("DOMContentLoaded", init, false);

//To save an array of attachments
var AttachmentArray = [];

//counter for attachment array
var arrCounter = 0;

//to make sure the error message for number of files will be shown only one time.
var filesCounterAlertStatus = false;

//un ordered list to keep attachments thumbnails
var ul = document.createElement("ul");
ul.className = "thumb-Images";
ul.id = "imgList";

function init() {
  //add javascript handlers for the file upload event
  document
    .querySelector("#files")
    .addEventListener("change", handleFileSelect, false);

     document
    .querySelector("#filesFooter")
    .addEventListener("change", handleFileSelect, false);

     document
    .querySelector('#refFiles').addEventListener('change', function(event) {
    var output = document.getElementById('FilelistRef'); // Get the output element
    output.innerHTML = ""; // Clear the output element

    // Loop through the selected files
    for (var i = 0; i < event.target.files.length; i++) {
      var file = event.target.files[i]; // Get the current file

      // Check if the current file is an image
      if (file.type.startsWith('image/')) {
        var img = document.createElement('img'); // Create an img element
        img.src = URL.createObjectURL(file); // Set the src attribute to the file object URL
        img.style.maxWidth = '100px'; // Set the max width of the image
        output.appendChild(img); // Append the image element to the output element
      }
    }
  })
}

//the handler for file upload event
function handleFileSelect(e) {
  var target  = e.target.getAttribute("data-list")||'Filelist';//
  //to make sure the user select file/files
  if (!e.target.files) return;

  //To obtaine a File reference
  var files = e.target.files;

  // Loop through the FileList and then to render image files as thumbnails.
  for (var i = 0, f; (f = files[i]); i++) {
    //instantiate a FileReader object to read its contents into memory
    var fileReader = new FileReader();

    // Closure to capture the file information and apply validation.
    fileReader.onload = (function(readerEvt) {
      return function(e) {
        //Apply the validation rules for attachments upload
        ApplyFileValidationRules(readerEvt);

        //Render attachments thumbnails.
        RenderThumbnail(e, readerEvt,target);

        //Fill the array of attachment
        FillAttachmentArray(e, readerEvt);
      };
    })(f);

    // Read in the image file as a data URL.
    // readAsDataURL: The result property will contain the file/blob's data encoded as a data URL.
    // More info about Data URI scheme https://en.wikipedia.org/wiki/Data_URI_scheme
    fileReader.readAsDataURL(f);
  }
  document
    .getElementById(target)
    .addEventListener("change", handleFileSelect, false);
}

//To remove attachment once user click on x button
jQuery(function($) {
  $("div").on("click", ".img-wrap .close", function() {
    var id = $(this)
      .closest(".img-wrap")
      .find("img")
      .data("id");

    //to remove the deleted item from array
    var elementPos = AttachmentArray.map(function(x) {
      return x.FileName;
    }).indexOf(id);
    if (elementPos !== -1) {
      AttachmentArray.splice(elementPos, 1);
    }

    //to remove image tag
    $(this)
      .parent()
      .find("img")
      .not()
      .remove();

    //to remove div tag that contain the image
    $(this)
      .parent()
      .find("div")
      .not()
      .remove();

    //to remove div tag that contain caption name
    $(this)
      .parent()
      .parent()
      .find("div")
      .not()
      .remove();

    //to remove li tag
    var lis = document.querySelectorAll("#imgList li");
    for (var i = 0; (li = lis[i]); i++) {
      if (li.innerHTML == "") {
        li.parentNode.removeChild(li);
      }
    }
  });
});

//Apply the validation rules for attachments upload
function ApplyFileValidationRules(readerEvt) {
  //To check file type according to upload conditions
  if (CheckFileType(readerEvt.type) == false) {
    alert(
      "The file (" +
        readerEvt.name +
        ") does not match the upload conditions, You can only upload jpg/png/gif files"
    );
    e.preventDefault();
    return;
  }

  //To check file Size according to upload conditions
  // if (CheckFileSize(readerEvt.size) == false) {
  //   alert(
  //     "The file (" +
  //       readerEvt.name +
  //       ") does not match the upload conditions, The maximum file size for uploads should not exceed 300 KB"
  //   );
  //   e.preventDefault();
  //   return;
  // }

  //To check files count according to upload conditions
  if (CheckFilesCount(AttachmentArray) == false) {
    if (!filesCounterAlertStatus) {
      filesCounterAlertStatus = true;
      alert(
        "You have added more than 10 files. According to upload conditions you can upload 10 files maximum"
      );
    }
    e.preventDefault();
    return;
  }
}

//To check file type according to upload conditions
function CheckFileType(fileType) {
  if (fileType == "image/jpeg") {
    return true;
  } else if (fileType == "image/png") {
    return true;
  } else if (fileType == "image/gif") {
    return true;
  } else {
    return false;
  }
  return true;
}

//To check file Size according to upload conditions
function CheckFileSize(fileSize) {
  if (fileSize < 300000) {
    return true;
  } else {
    return false;
  }
  return true;
}

//To check files count according to upload conditions
function CheckFilesCount(AttachmentArray) {
  //Since AttachmentArray.length return the next available index in the array,
  //I have used the loop to get the real length
  var len = 0;
  for (var i = 0; i < AttachmentArray.length; i++) {
    if (AttachmentArray[i] !== undefined) {
      len++;
    }
  }
  //To check the length does not exceed 10 files maximum
  if (len > 9) {
    return false;
  } else {
    return true;
  }
}

//Render attachments thumbnails.
function RenderThumbnail(e, readerEvt,target) {
  var li = document.createElement("li");
  ul.appendChild(li);
  li.innerHTML = [
    '<div class="img-wrap"> <span class="close">&times;</span>' +
      '<img class="thumb" src="',
    e.target.result,
    '" title="',
    escape(readerEvt.name),
    '" data-id="',
    readerEvt.name,
    '"/>' + "</div>"
  ].join("");


  var div = document.createElement("div");
  div.className = "FileNameCaptionStyle";
  li.appendChild(div);
  div.innerHTML = [readerEvt.name].join("");
  document.getElementById(target).insertBefore(ul, null);
}

//Fill the array of attachment
function FillAttachmentArray(e, readerEvt) {
  AttachmentArray[arrCounter] = {
    AttachmentType: 1,
    ObjectType: 1,
    FileName: readerEvt.name,
    FileDescription: "Attachment",
    NoteText: "",
    MimeType: readerEvt.type,
    Content: e.target.result.split("base64,")[1],
    FileSizeInBytes: readerEvt.size
  };
  arrCounter = arrCounter + 1;
}



// JavaScript code
// Add event listeners to the radio buttons
document.getElementById('6hrs').addEventListener('click', updateDeadline);
document.getElementById('12hrs').addEventListener('click', updateDeadline);
document.getElementById('18hrs').addEventListener('click', updateDeadline);
document.getElementById('24hrs').addEventListener('click', updateDeadline);
document.getElementById('30hrs').addEventListener('click', updateDeadline);

// Function to update the deadline value based on the selected radio button
function updateDeadline(event) {
    const selectedOption = event.target.id; // Get the ID of the selected radio button
    const currentDate = new Date(); // Get the current date and time
    let hoursToAdd = 0;
    
    // Determine the number of hours to add based on the selected radio button
    switch (selectedOption) {
        case '6hrs':
            hoursToAdd = 6;
            break;
        case '12hrs':
            hoursToAdd = 12;
            break;
        case '18hrs':
            hoursToAdd = 18;
            break;
        case '24hrs':
            hoursToAdd = 24;
            break;
        case '30hrs':
            hoursToAdd = 30;
            break;
        default:
            break;
    }
    
    // Calculate the new deadline by adding the hours to the current date
    const newDeadline = new Date(currentDate.getTime() + (hoursToAdd * 60 * 60 * 1000));
    const deadlineInput = document.getElementById('deadlineInput');
    const labels = document.getElementsByTagName('label');

    // // Update the value of the deadline input field
    // var datetime = newDeadline.toISOString().slice(0, -8); // Format the date as "YYYY-MM-DDTHH:mm"
    // datetime += "T" + newDeadline.getHours().toString().padStart(2, '0') + ":" + newDeadline.getMinutes().toString().padStart(2, '0');

    // Convert the current date and time to local time string in the correct format
    var year = newDeadline.getFullYear();
    var month = (newDeadline.getMonth() + 1).toString().padStart(2, '0');
    var day = newDeadline.getDate().toString().padStart(2, '0');
    var hours = newDeadline.getHours().toString().padStart(2, '0');
    var minutes = newDeadline.getMinutes().toString().padStart(2, '0');
    var seconds = newDeadline.getSeconds().toString().padStart(2, '0'); // Add seconds component
    var localDateTime = year + "-" + month + "-" + day + "T" + hours + ":" + minutes+":" + seconds;;
    deadlineInput.value = localDateTime;
    // Remove the "selected" class from all labels
    for (let i = 0; i < labels.length; i++) {
        labels[i].classList.remove('selected');
    }
    
    // Add the "selected" class to the selected label
    event.target.nextElementSibling.classList.add('selected');
}