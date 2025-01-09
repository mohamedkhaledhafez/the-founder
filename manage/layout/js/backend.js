///////////////////////////////////////////////////// Click anywhere outside Setting icon and toggle the box :
// toogle.innerHTML = "Open";
// let boxes = document.querySelector(".sidebar");
// let toggleButton = document.querySelector(".sidebar .toggle");
// let optionsBox = document.querySelector(".sidebar .menu_bar");

// toggleButton.addEventListener("click", () => {
//   boxes.classList.toggle("close");
//   // toogle.innerHTML.toggle("Close");
// });


// toggleButton.addEventListener("click", (e) => {
//   // console.log(e.target);
//   if (
//     e.target !== toggleButton &&
//     e.target !== boxes &&
//     e.target == optionsBox
//   ) {
//     //  console.log("this is not the toggle button or The menu");
//     // Check if menu is opened or not :
//     if (!boxes.classList.contains("close")) {
//       // console.log("Menu Now is opened");

//       // Toggle menu  :
//       // toggleButton.classList.toggle("sidebar");

//       // Toggle the opne class on  Links Menu :
//       boxes.classList.toggle("close");
//     }
//   }
// });

///////////////////////////////////////////////// check if there is local storage color option (local storage is not Empty)
let mainColors = localStorage.getItem("color_option");

if (mainColors !== null) {
  //console.log("oooooopsssss");
  console.log(localStorage.getItem("color_option"));

  document.documentElement.style.setProperty("--main-color", mainColors);

  // Remove active class from all colors list items :
  document.querySelectorAll(".colors-list li").forEach((element) => {
    element.classList.remove("active");

    // Add active class on element with data-color === local storage item
    if (element.dataset.color === mainColors) {
      // Add active class :
      element.classList.add("active");
      // console.log(mainColors);
    }
  });
}

//////////////////////////////////////////////////////////////////////  Switch page colors from setting :

const colorsLi = document.querySelectorAll(".colors-list li");

//Loop in List items
colorsLi.forEach((li) => {
  // Click on every list items
  li.addEventListener("click", (event) => {
    // console.log(event.target.dataset.color);
    // Set color on root
    document.documentElement.style.setProperty(
      "--main-color",
      event.target.dataset.color
    );

    // set color on local storage :
    localStorage.setItem("color_option", event.target.dataset.color);

    handleActive(event);
  });
});

/////////////////////////////////////////////////////// Handle Active class state ///////////////////////////

function handleActive(e) {
  // Remove active class from all children :
  e.target.parentElement.querySelectorAll(".active").forEach((element) => {
    element.classList.remove("active");
  });

  // Add active class on the clicked element :
  e.target.classList.add("active");
}

// const chng_btn = document.getElementById("change_btn");

// chng_btn.addEventListener("click", function onClick() {
//   chng_btn.style.color = "#f00";
//   chng_btn.style.backgroundColor = "#0f0";
// });

$(document).ready(function () {
  "use strict";

  // Show subjects depend on selected grade
  $("#project_select").on("change", function () {
    var project_ID = $(this).val();
    // console.log(grade_ID);
    if (project_ID) {
      $.get("ajax.php", { Unit: project_ID }, function (data) {
        $("#select_Unit").html(data);
      });
    } else {
      $("#select_Unit").html("<option>Select Project First</option>");
    }
  });
  
  $("#account_project").on("change", function () {
    var Project = $(this).val();
    // console.log(grade_ID);
    if (Project) {
      $.get("ajax.php", { UNIT: Project }, function (data) {
        $("#account_Unit").html(data);
      });
    } else {
      $("#account_Unit").html("<option>Select Project First</option>");
    }
  });
  
  $("#account_Unit").on("change", function () {
    var UNIT = $(this).val();
    // console.log(grade_ID);
    if (UNIT) {
      $.get("ajax.php", { Client: UNIT }, function (data) {
        $("#account_client").html(data);
      });
    } else {
      $("#account_client").html("<option>Select Project First</option>");
    }
  });
  
  $("#role_select_box").on("change", function () {
    var Department = $(this).val();
    // console.log(Department);
    if (Department) {
      $.get("ajax.php", { ADMIN: Department }, function (data) {
        $("#admin_select").html(data);
      });
    } else {
      $("#admin_select").html("<option>Select Project First</option>");
    }
  });


  /* setInterval(() => {
    get_data();
  }, 1000);

  function get_data() {
    jQuery.ajax({
      type: "GET",
      url: "getStudentChat.php",
      data: "",
      beforeSend: function () {},
      complete: function () {},
      success: function (data) {
        $(".comment-box").html(data);
      },
    });
  } */
  /*  $("#selected_student").change(
    setInterval(function () {
      function loadDoc() {
        var x = $("#selected_student").val();
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("comment_box").innerHTML =
              this.responseText;
          }
        };
        xhttp.open("GET", "getStudentChat.php?student=" + x, false);
        xhttp.send(null);
      }
    }, 1000)
  );

  loadDoc(); */

  // Parent Chat
  $("#selected_parent").change(function () {
    var y = $("#selected_parent").val();
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET", "getParentChat.php?parent=" + y, false);
    xmlhttp.send(null);
    $("#comment_box").html(xmlhttp.responseText);
    $("#div_to_send_msg").val(y);
  });

  // Dashboard
  $(".toggle-info").click(function () {
    $(this)
      .toggleClass("selected")
      .parent()
      .next(".panel-body")
      .fadeToggle(200);

    if ($(this).hasClass("selected")) {
      $(this).html('<i class="fa fa-plus fa-lg"></i>');
    } else {
      $(this).html('<i class="fa fa-minus fa-lg"></i>');
    }
  });

  // Dashboard
  $(".col-sm-12 .panel .toggle-info").click(function () {
    $(this)
      .toggleClass("selected")
      .parent()
      .next(".panel-body")
      .fadeToggle(200);

    if ($(this).hasClass("selected")) {
      $(this).html('<i class="fa fa-plus fa-lg"></i>');
    } else {
      $(this).html('<i class="fa fa-minus fa-lg"></i>');
    }
  });

  // Fire / Trigger The Selectboxit
  /* $("select").selectBoxIt({
    autoWidth: false,
  }); */

  // Hide placeholder on focus :
  $("[placeholder]")
    .focus(function () {
      $(this).attr("data-text", $(this).attr("placeholder"));
      $(this).attr("placeholder", "");
    })
    .blur(function () {
      $(this).attr("placeholder", $(this).attr("data-text"));
    });

  // Add * on required fields
  /*  $("input").each(function () {
    if ($(this).attr("required") === "required") {
      $(this).after('<span class="asterisk">*</span>');
    }
  }); */

  // Convert Password Field To Text Field On Hover

  let passFiled = $(".password");

  $(".show-pass").hover(
    function () {
      passFiled.attr("type", "text");
    },
    function () {
      passFiled.attr("type", "password");
    }
  );

  // Confirm message on Delete button
  $(".confirm").click(function () {
    return confirm("Are you sure you want to Delete this item");
  });

  // Category View Option
  $(".cat h3, .categories h3 ").click(function () {
    $(this).next(".full-view").fadeToggle(300);
  });

  $(".options span").click(function () {
    $(this).addClass("active").siblings("span").removeClass("active");

    if ($(this).data("view") === "full") {
      $(".cat .full-view").fadeIn(200);
    } else {
      $(".cat .full-view").fadeOut(200);
    }
  });
  // Show Delete Button On Child Categories
  $(".child-cat").hover(
    function () {
      $(this).find(".show-delete").fadeIn();
    },
    function () {
      $(this).find(".show-delete").fadeOut();
    }
  );

  // Trigger Nice Scroll :
  // $(".sidebar").niceScroll({
  //   cursorcolor: "rgb(191, 144, 0)",
  //   cursorwidth: "4px",
  //   cursorborder: "none",
  //   railalign: "left",
  // });
});



// Scroll chat form to bottom
// let scroll_to_bottom = document.getElementById("send_form");
// scroll_to_bottom.scrollIntoView(false);

