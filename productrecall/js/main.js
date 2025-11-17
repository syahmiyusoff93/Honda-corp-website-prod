var product_type, selectedBox, dealerID, dealerNameSubmit;
var inPeriod = "no";
var clickedDealer = 0;
var mDevice = false;

// nat 
var rpause = true;
var noticeadded = false;


if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
  mDevice = true;
}

$(document).ready(function () {
  window.fbAsyncInit = function () {
    FB.init({
      appId: "340236696327882",
      xfbml: true,
      version: 'v2.6'
    });
  };

  if (rpause) {
    $(".nav-3").css({
      "display": "none"
    });
    $(".nav-4").css({
      "display": "none"
    });
    $(".nav-5").css({
      "display": "none"
    });

  }

  (function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) {
      return;
    }
    js = d.createElement(s);
    js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  $(".fb-btn").click(function () {
    var domain = "https://productrecall.honda.com.my/";
    FB.ui({
        method: 'feed',
        name: 'At Honda, your safety is always our top priority',
        link: domain,
        picture: domain + "img/fb_thumbnail.jpg",
        caption: 'Product Recall',
        description: 'As a precautionary measure, Honda Malaysia is offering FREE replacements on recalls for Front Airbags, Continuous Variable Transmissions (CVT), and 12V Batteries.',
        display: 'popup'
      },
      function (response) {
        if (response && response.post_id) {
          //response action          
          ga('send', 'event', 'Interaction', 'facebookShare', 'Facebook');
        }
      })
  })

  $('.twitter-btn').click(function (event) {
    var width = 575,
      height = 400,
      left = ($(window).width() - width) / 2,
      top = ($(window).height() - height) / 2,
      url = this.href,
      opts = 'status=1' +
      ',width=' + width +
      ',height=' + height +
      ',top=' + top +
      ',left=' + left;

    window.open(url, 'twitter', opts);
    ga('send', 'event', 'Interaction', 'twitterShare', 'Twitter');
    return false;
  });

  if (!mDevice) {
    $(".title, .step-margin").mCustomScrollbar();
  }

  $(".content").mCustomScrollbar({
    theme: "light",
  });
  // $(".howto-content").mCustomScrollbar({
  //   axis:"yx"
  // });

  $(".fb-icon").click(function () {
    ga('send', 'event', 'Interaction', 'gotoFacebook', 'Landing');
  })

  $(".insta-icon").click(function () {
    ga('send', 'event', 'Interaction', 'gotoInstagram', 'Landing');
  })

  $(".youtube-icon").click(function () {
    ga('send', 'event', 'Interaction', 'gotoInstagram', 'Landing');
  })

  $(".corporate-link").click(function () {
    ga('send', 'event', 'Interaction', 'gotoHondaCorp', 'Landing');
  })

  $("#nav-hubs").click(function () {
    // alert("Sorry. This content will be updated soon.")
    ga('send', 'event', 'Interaction', 'viewMobileHubs', 'Landing');
  })

  //new affected list engine
  $("#list-model ul li").click(function () {
    $(".scroll-note").fadeOut(800, "easeInOutCubic")
    $("#list-year ul").show()
    $("#list-year ul").mCustomScrollbar("update");
    var model = $(this).attr("data-model")
    $("#list-model ul li").removeClass("active")
    $(this).addClass("active");
    $(".yearmodel").hide();
    $(".affected-parts").hide();
    $(".list-title.yearmodel").show()
    $("." + model).show();
    if (mDevice) {
      $(".affected-nav-yearmodel").show();
      $(".affected-nav-model").css({
        "color": "#cc0000"
      });
      $("#list-year").animate({
        "left": "0"
      }, 800, "easeInOutCubic");
    }
  })

  $("#list-year ul li").click(function () {
    $("#list-parts").show()
    $("#list-parts ul").mCustomScrollbar("update");
    var code = $(this).attr("data-code");
    $("#list-year ul li").removeClass("active")
    $(this).addClass("active");
    var codePart = code.split("");
    $(".affected-parts").hide();
    $(".affected-parts.part-title, .affected-parts.part-cta").show()
    // ---------------------------------------------------------------------------------------- ICON VISIBILITY SWITCH [SAI]

    var parts = code.split(",");
    for (i = 0; i < parts.length; i++) {

      $(".dbpartid" + parts[i]).show();

    }

    /*
    if(parseInt(codePart[0])){
      $(".airbag").show();
    }
    if(parseInt(codePart[1])){
      $(".battery").show();
    }
    if(parseInt(codePart[2])){
      $(".cvt").show();
    }
    if(parseInt(codePart[3])){
      $(".engine").show();
    }
	  
	if(parseInt(codePart[4])){
      $(".vbody").show();
    }
	 if(parseInt(codePart[5])){
      $(".vundercarriage").show();
    }
	 if(parseInt(codePart[6])){
      $(".batteryS").show();
    }
	
	 if(parseInt(codePart[7])){
      $(".vsidemirrorsw").show();
    }
	  
	  if(parseInt(codePart[8])){
		  $(".eps").show();
		}
		*/

    // ---------------------------------------------------------------------------------------- ICON VISIBILITY SWITCH ENDS

    if (mDevice) {
      $(".affected-nav-parts").show()
      $(".affected-nav-yearmodel").css({
        "color": "#cc0000"
      })
      $("#list-parts").animate({
        "left": "0"
      }, 800, "easeInOutCubic")
    }
  })

  $(".affected-nav-model").click(function () {
    $("#list-model ul li").removeClass("active")
    $(".affected-nav-yearmodel").hide()
    $(".affected-nav-parts").hide()
    $(".affected-nav-yearmodel").css({
      "color": "#000"
    })
    $(".affected-nav-model").css({
      "color": "#000"
    })
    $("#list-parts").animate({
      "left": "100%"
    }, 800, "easeInOutCubic", function () {
      $(".affected-parts").hide();
    })
    $("#list-year").animate({
      "left": "100%"
    }, 800, "easeInOutCubic", function () {
      $(".yearmodel").hide();
    })
  })

  $(".affected-nav-yearmodel").click(function () {
    $("#list-year ul li").removeClass("active")
    $(".affected-nav-yearmodel").css({
      "color": "#000"
    })
    $(".affected-nav-parts").hide()
    $("#list-parts").animate({
      "left": "100%"
    }, 800, "easeInOutCubic", function () {
      $(".affected-parts").hide();
    })
  })

  var affectPos = "close";
  $("#nav-affected").click(function () {
    if (!$(".affected").is(':animated')) {
      if (affectPos == "close") {
        $(".affected").animate({
          "top": "0%"
        }, 800, "easeInOutCubic", function () {
          $("#list-model ul").mCustomScrollbar({
            theme: "dark",
            autoDraggerLength: false,
            callbacks: {
              onScrollStart: function () {
                $(".scroll-note").fadeOut(800, "easeInOutCubic")
              },
              onOverflowY: function () {
                $(".scroll-note").fadeIn(800, "easeInOutCubic")
              },
            }
          })

          $("#list-year ul").mCustomScrollbar({
            theme: "dark",
            autoDraggerLength: false,
          })

          $("#list-parts").mCustomScrollbar({
            theme: "dark",
            autoDraggerLength: false,
          })
        })
        $("#nav-affected").css({
          "background": "#ae0707"
        })
        ga('send', 'event', 'Interaction', 'affectedList', 'Landing');
        affectPos = "open";
      } else if (affectPos == "open") {
        $(".affected").animate({
          "top": "100%"
        }, 800, "easeInOutCubic")
        $("#nav-affected").css({
          "background": "#cc0000"
        })
        affectPos = "close";
      }
    }
  })

  $(".affected-close").click(function () {
    $(".affected").animate({
      "top": "100%"
    }, 800, "easeInOutCubic", function () {
      $("#list-year ul").hide()
      $("#list-parts").hide()
      $(".list-column ul li").removeClass("active")
      if (mDevice) {
        $("#list-year").css({
          "left": "100%"
        })
        $("#list-parts").css({
          "left": "100%"
        })
      }
    })
    $("#nav-affected").css({
      "background": "#cc0000"
    })
    affectPos = "close";
  })

  var atLanding = 1;
  var timer;
  $(".start-btn").click(function () {
    ga('send', 'event', 'Interaction', 'beginVinCheck', 'Landing');
    if (!$("*").is(':animated')) {
      $(".landing").animate({
        "right": "100%"
      }, 800, "easeInOutCubic", function () {
        $(".landing").css({
          "right": "110%"
        })
        if (affectPos == "open") {
          $(".affected").animate({
            "top": "100%"
          }, 800, "easeInOutCubic")
          $("#nav-affected").css({
            "background": "#cc0000"
          })
          $(".yearmodel").hide();
          $(".affected-parts").hide();
          $("#list-model ul li").removeClass("active")
          $("#list-year ul li").removeClass("active")
          if (mDevice) {
            $("#list-model ul li").removeClass("active")
            $(".affected-nav-yearmodel").hide()
            $(".affected-nav-parts").hide()
            $(".affected-nav-yearmodel").css({
              "color": "#000"
            })
            $(".affected-nav-model").css({
              "color": "#000"
            })
            $("#list-year").css({
              "left": "100%"
            })
            $("#list-parts").css({
              "left": "100%"
            })
          }
          affectPos = "close";
        }
      });
      $("#step-1, .vin-progress").show().animate({
        "right": "0%"
      }, 800, "easeInOutCubic");
      $(".header").css({
        "box-shadow": "none"
      })
      $("#step-1").addClass("here");
      $(".useful-guides").fadeIn();
      atLanding = 0;

    }
  })


  $(".next-btn").click(function () {
    if (!$("*").is(':animated')) {
      var currentStep = $(".here").attr("id");
      var currentInt = $(".here").attr("id").split("-")[1];
      var nextInt = parseInt(currentInt) + 1;
      var nextNextInt = parseInt(nextInt) + 1;
      var pass = 0;
      if (currentInt < "5") {
        ga('send', 'event', 'Interaction', 'clickedToStep-' + nextInt, 'VinChecker');
        if (currentInt == "1") {
          $(".vinsubmit").trigger("click");
        }
        if (currentInt == "2") {
          nextStep(currentStep, currentInt, nextInt, nextNextInt)
          if (clickedDealer == 1) {
            $(".next-btn, .next-btn span").css({
              "color": "#cc0000",
              "pointer-events": "auto"
            })
          } else {
            $(".next-btn, .next-btn span").css({
              "color": "#dadada",
              "pointer-events": "none"
            })
          }
        }
        if (currentInt == "3") {
          if (clickedDealer == 1) {
            $(".preferred-dealer").html(dealerNameSubmit)
            nextStep(currentStep, currentInt, nextInt, nextNextInt)
            if (inPeriod == "yes") {
              setTimeout(function () {
                alert("Dear Valued Customer:\n\nWe sincerely apologise for the delay in responding to your enquiries submitted between October 2016 – January 2017 due to technical difficulties.\n\nRest assured, the issue has since been rectified and a member of our team will be personally contacting you soon.\n\nYour patience and understanding is much appreciated.")
              }, 1500)
            }
            if ($(".updatename").val().length == 0 || $(".updatehpno").val().length == 0 || $(".updateemail").val().length == 0) {
              $(".next-btn, .next-btn span").css({
                "color": "#dadada",
                "pointer-events": "none"
              })
            }
          }
        }
        if (currentInt == "4") {
          $(".updateemailsubmit").trigger("click");
        }
        // nextStep(currentStep,currentInt,nextInt,nextNextInt)
      }
    }
  })

  $(".prev-btn").click(function () {
    if (!$("*").is(':animated')) {
      var currentStep = $(".here").attr("id");
      var currentInt = $(".here").attr("id").split("-")[1];
      var nextInt = parseInt(currentInt) + 1;
      var prevInt = parseInt(currentInt) - 1;
      var prevPrevInt = parseInt(prevInt) - 1;
      if (currentInt == "1") {
        resetSteps(currentInt);
      } else {
        $(".mobile-pagination p").html("STEP " + prevInt + " / 2");
        ga('send', 'event', 'Interaction', 'clickedBackToStep-' + prevInt, 'VinChecker');
        if (currentInt == "2") {
          $(".home-btn").css({
            "pointer-events": "none"
          }).animate({
            "opacity": "0"
          }, function () {
            $(".next-btn").fadeIn().css({
              "display": "inline-block"
            });
          })
        }
        if (currentInt == "3") {
          $(".next-btn, .next-btn span").css({
            "color": "#cc0000",
            "pointer-events": "auto"
          })
          // $(".stock-availability").hide()
          // $("select#select_dealer").val("0");
        }
        if (currentInt == "4") {
          $(".next-btn, .next-btn span").css({
            "color": "#cc0000",
            "pointer-events": "auto"
          })
        }
        $("#" + currentStep).removeClass("here");
        $("#step-" + currentInt).animate({
          "right": "-100%"
        }, 800, "easeInOutCubic", function () {
          $("#step-" + currentInt).hide();
        });
        $(".nav-" + currentInt).removeClass("active");
        $(".nav-title-" + currentInt).css({
          "display": "none"
        });
        $("#step-" + prevInt).show().animate({
          "right": "0%"
        }, 800, "easeInOutCubic");
        $("#step-" + prevInt).addClass("here");
        $(".nav-" + prevInt).addClass("active");
        $(".nav-" + currentInt).animate({
          "margin-left": "150px"
        });
        $(".nav-" + nextInt).animate({
          "margin-left": "0px"
        });
        $(".nav-title-" + prevInt).fadeIn();
      }
    }
  })

  $(".home-btn").click(function () {
    if (!$("*").is(':animated')) {
      var currentInt = $(".here").attr("id").split("-")[1];
      noticeadded = false;
      resetSteps(currentInt);
    }
  })

  $(".not-main").click(function () {
    $(".not-required, .not-required-bg").fadeOut(function () {
      resetSteps("1");
    });
  })

  $(".not-restart").click(function () {
    $(':input').val('');
    $(".next-btn, .next-btn span").css({
      "color": "#dadada",
      "pointer-events": "none"
    })
    $(".not-required, .not-required-bg").fadeOut();
    ga('send', 'event', 'Interaction', 'notRequiredRestart', 'VinChecker');
  })

  var mobileVisible = 0;
  $("#nav-guide, .close-guide-mobile, .guide-overlay").click(function () {
    $(".glyph-guide").removeClass("glyphicon-triangle-top").addClass("glyphicon-triangle-bottom")
    if ($(window).width() >= 768) {
      $(".guide-expanded").css({
        "position": "fixed",
        "bottom": "250px",
        "right": "20px"
      })
      $(".guide-expanded, .guide-overlay").toggle();
      $(".close-guide-mobile").hide();
    } else {
      $(".close-guide-mobile").show();
      if (mobileVisible == 0) {
        $(".guide-overlay").fadeIn()
        $(".guide-expanded").animate({
          "right": "0"
        })
        mobileVisible = 1;
      } else {
        // $(".guide-expanded, .guide-overlay").toggle();
        $(".guide-expanded").animate({
          "right": "-100%"
        })
        $("#nav-guide").css({
          "background": "#cc0000"
        })
        $(".guide-overlay").fadeOut()
        mobileVisible = 0;
      }
    }
    if ($(window).width() >= 768) {
      if ($(".guide-expanded, .guide-overlay").is(":visible")) {
        $("#nav-guide").css({
          "background": "#ae0707"
        });
        $(".bubble-top").hide();
        $(".bubble-bottom").show();
      } else {
        $("#nav-guide").css({
          "background": "#cc0000"
        });
        $(".guide-expanded").attr("style", "")
        $(".bubble-top").show();
        $(".bubble-bottom").hide();
      }
    }
  })

  $(window).resize(function () {
   // $("#list-model ul").mCustomScrollbar("destroy");
    $(".scroll-note").hide()
    if ($(".guide-expanded, .guide-overlay").is(":visible")) {
      $(".guide-expanded, .guide-overlay").hide();
      $("#nav-guide").css({
        "background": "#cc0000"
      })
      $(".guide-expanded").attr("style", "")
      $(".bubble-top").show();
      $(".bubble-bottom").hide();
    }
    if ($(window).width() < 768) {
      $(".guide-expanded").show()
      $(".guide-overlay").hide()
      mobileVisible = 0;
    }
  })

  if ($(window).width() >= 1024) {
    $(".useful-guides").click(function () {
      $(".close-guide-mobile").hide();
      $(".bubble-bottom").hide();
      $(".guide-expanded, .guide-overlay").toggle();
      if ($(".guide-expanded, .guide-overlay").is(":visible")) {
        $(".glyph-guide").removeClass("glyphicon-triangle-bottom").addClass("glyphicon-triangle-top")
      } else {
        $(".glyph-guide").removeClass("glyphicon-triangle-top").addClass("glyphicon-triangle-bottom")
        ga('send', 'event', 'Interaction', 'viewGuide', 'Landing');
      }
    })


  } else {
    $(".useful-guides").click(function () {
      if (mobileVisible == 0) {
        $(".close-guide-mobile").hide();
        $(".guide-overlay").fadeIn()
        $(".guide-expanded").animate({
          "right": "0"
        })
        $(".glyph-guide").removeClass("glyphicon-triangle-bottom").addClass("glyphicon-triangle-top")
        ga('send', 'event', 'Interaction', 'viewGuide', 'Landing');
        mobileVisible = 1;
      } else {
        $(".close-guide-mobile").hide();
        // $(".guide-expanded, .guide-overlay").toggle();
        $(".guide-expanded").animate({
          "right": "-100%"
        })
        $("#nav-guide").css({
          "background": "#cc0000"
        })
        $(".guide-overlay").fadeOut()
        $(".glyph-guide").removeClass("glyphicon-triangle-top").addClass("glyphicon-triangle-bottom")
        mobileVisible = 0;
      }
    })
  }

  $(".dont-know-vin, #close-howto").click(function () {
    $(".howto, .not-required-bg").toggle();
    if ($(".howto, .not-required-bg").is(":visible")) {
      ga('send', 'event', 'Interaction', 'findVin', 'VinChecker');
    }
  })

  function resetSteps(currentInt) {

    $(".useful-guides").fadeOut();
    $("#step-" + currentInt + ", .vin-progress").animate({
      "right": "-100%"
    }, 800, "easeInOutCubic", function () {
      $("#step-" + currentInt).hide();
    });
    $(".landing").css({
      "right": "100%"
    }).animate({
      "right": "0%"
    }, 800, "easeInOutCubic", function () {
      $("#step-1, #step-2, #step-3, #step-4").css({
        "right": "-100%"
      }).hide();
      $(".vin-progress ul li").removeClass("active");
      $(".vin-progress ul li").css({
        "margin-left": "0px"
      })
      $(".nav-1").addClass("active");
      $(".nav-title-1, .nav-title-2, .nav-title-3, .nav-title-4, .nav-title-5").css({
        "display": "none"
      });
      $(".nav-2").css({
        "margin-left": "150px"
      })
      // $(".nav-title-1").show();
      $(".next-btn, .prev-btn, .nav-title-1").css({
        "display": "inline-block"
      });
      $(".home-btn").animate({
        "opacity": "0"
      }).css({
        "pointer-events": "none"
      });
      $(".next-btn, .next-btn span").css({
        "color": "#dadada",
        "pointer-events": "none"
      })
      $(".stock-availability").hide();
      $(':input').val('');
      if ($(window).width() < 768) {
        $(".home-btn").attr("style", "")
        $(".mobile-pagination p").html("STEP 1 / 2");
      }
    });
    atLanding = 1;
    clickedDealer = 0;
    ga('send', 'event', 'Interaction', 'goToHome', 'VinChecker');
  }

  function nextStep(currentStep, currentInt, nextInt, nextNextInt) {
    $("#" + currentStep).removeClass("here");
    $("#step-" + currentInt).animate({
      "right": "100%"
    }, 800, "easeInOutCubic", function () {
      $("#step-" + currentInt).hide();
    });
    $(".nav-" + currentInt).removeClass("active");
    $(".nav-title-" + currentInt).css({
      "display": "none"
    });
    $("#step-" + nextInt).show().animate({
      "right": "0%"
    }, 800, "easeInOutCubic");
    $("#step-" + nextInt).addClass("here");
    $(".nav-" + nextInt).addClass("active");
    $(".mobile-pagination p").html("STEP " + nextInt + " / 2");
    // $(".nav-title-"+nextInt).css({"display":"inline-flex"});
    $(".nav-title-" + nextInt).fadeIn();
    $(".nav-" + nextInt).animate({
      "margin-left": "0px"
    });
    // var spanWidth = $(".nav-title-"+nextInt).width();
    // spanWidth = parseInt(spanWidth);
    $(".nav-" + nextNextInt).animate({
      "margin-left": "150px"
    });
    // $(".nav-title-"+nextInt).css({"width":"150px"})
    if (nextInt == "5") {
      $(".next-btn").fadeOut(function () {
        $(".home-btn").animate({
          "opacity": "1"
        }).css({
          "pointer-events": "initial"
        });
        $(".prev-btn").fadeOut();
      })
    }
  }

  $('.vininput').on('input', function () {
    if ($(".vininput").val().length < 9 || $(".vininput").val().length > 17) {
      $(".next-btn, .next-btn span").css({
        "color": "#dadada",
        "pointer-events": "none"
      })
    } else {
      $(".next-btn, .next-btn span").css({
        "color": "#cc0000",
        "pointer-events": "auto"
      })
      $("#vin-error").html("")
    }
  });

  $('.updatename, .updatehpno, .updateemail').on('input', function () {
    if ($(".updatename").val() == "" || $(".updatehpno").val() == "" || $(".updateemail").val() == "") {
      $(".next-btn, .next-btn span").css({
        "color": "#dadada",
        "pointer-events": "none"
      })
    } else {
      $(".next-btn, .next-btn span").css({
        "color": "#cc0000",
        "pointer-events": "auto"
      })
    }
  })

  $(".productupdatepopupclose_mobile_hub").click(function () {
    $(".mobile_hub_popup").fadeOut();
    // $(".productupdateoverlay").fadeOut();
  })

  $("#show-pay").click(function () {
    var form = $(this).parents('form:first');
    form.find("input[name=formVin]").val($('input[name=vin]').val());
    form.find("input[name=formDealer]").val($('#select_dealer').val());
    form.submit();
    return false;
  });


  var product_type = "";
  var vinrequired = "";
  $(".vinsubmit").click(function () {
    if (rpause) $(".pudNotice052021").remove();
    $("#vin-error").html("");
    if ($(".vininput").val() == "") {
      $("#vin-error").html("Please key in your Vehicle Identification Number (VIN).")
    } else if ($(".vininput").val().length < 9 || $(".vininput").val().length > 17) {
      $("#vin-error").css({
        "color": "#cc0000"
      }).html("Input invalid. e.g. <span style='color:#cc0000'>PMHGD86503D100001 or ES1-900012</span>")
    } else {
      var formObj = $(".productupdateform");

      if (!formObj.hasClass("disabled")) {
        formObj.addClass("disabled");
        var formData = formObj.serialize();
        $(".product_header").html("<span></span>")
        $(".diagnosis").html('<tr><th style="width: 35%;padding-left: 10px;">PART</th><th style="width: 30%;padding-left: 10px;">PART NO.</th><th style="width: 35%;padding-left: 10px;">STATUS</th></tr>')
        product_type = "";
        $(".productupdateoverlay").show();
        $(".loading_overlay").show();
        $("#show-pay").hide()
        // $("#show-stock").hide()
        $("select#select_dealer").val("0");
        $.ajax({
          type: "POST",
          url: "ajax/ajax_checkvin.php",
          data: formData,
          dateType: "json",
          success: function (data) {
            var actioncopy, donecopy;
            var passVinNo = formData.split("vin=")[1].split("&")[0];
            $(".car-vin h2").html(passVinNo)
            $(".stock-availability").hide();
            $("#show-stock").attr("href", "/stock/index.html")
            $(".diagnosis tr td").css({
              "color": "black",
              "border": "black"
            })
            $(".productupdateoverlay").hide();
            $(".loading_overlay").hide();
            //data = $.trim(data)
            var color_label = "";
            var text_label = "";
            var response = data;
            formObj.removeClass("disabled");
            //formObj[0].reset();
            //var productText = { airbagD: "Driver's Airbag", airbagP: "Passenger's Airbag", battery : "12V Battery", cvt : "CVT", threeWay : "3 Way Joint Hose", batteryS : "Battery Sensor"}
            // if(response["status"] == "yes"){
            var params = "";
            var showHub = 0;
            var showDealer = 0;
            vinrequired = "not required";
            if (response["inPeriod"] > 0) {
              inPeriod = "yes";
            } else {
              inPeriod = "no";
            }
            if (response["status"] == "yes") {
              $(".car-model h2").html("Honda " + response["items"][0]["model"])
              // $(".car-model h3").html("Year Model " + response["items"][0]["year"])
              $(".car-model h3").html("Year Model " + response["items"].at(-1)["year"])
              ga('send', 'event', 'Goal', 'vinSubmit', 'required');
              nextStep("step-1", "1", 2, 3)
              var affectCount = 0;
              for (i = 0; i < response["items"].length; i++) {

                // $(".product_header").append("<span>"+productText[response["items"][i]["name"]]+" </span> ")
                // product_type = product_type.concat(response["items"][i]["name"]);
                // if (i < response["items"].length-2){
                //   $(".product_header").append(", ")
                //   product_type = product_type.concat(", ")
                // } else if (i == (response["items"].length-2)){
                //   $(".product_header").append("and ")
                //   product_type = product_type.concat(" and ")
                // }
                // $(".product_header").show()
                if (response["items"][i]["status"].toLowerCase() == "not done" && (response["items"][i]["name"] == "battery" || response["items"][i]["name"] == "batteryS" || response["items"][i]["name"] == "cvt" || response["items"][i]["name"] == "doorMirrorSw" || response["items"][i]["name"] == "StabBarFr" || response["items"][i]["name"] == "threeWay" || response["items"][i]["name"] == "fuelP")) {

                  actioncopy = 'Defective part needs to be replaced immediately. Please visit the nearest Honda Authorised  Dealers for FREE Replacement.'
                  params = params + "partNo[]=" + response["items"][i]["partNo"];
                  color_label = "#cc0000;font-weight:600";
                  text_label = "<img src='img/warning-icon.svg'/ style='margin-right: 10px;width: 23px;height: 23px;'>" + actioncopy;
                  vinrequired = "required";
                  showDealer = 1;
                  affectCount++;
                } else if (response["items"][i]["status"].toLowerCase() == "not done" && response["items"][i]["name"] == "airbagD" && (response["items"][i]["year"].toLowerCase() == "1999" || response["items"][i]["year"].toLowerCase() == "2000")) {

                  actioncopy = 'The required part needs to be inspected immediately. Kindly visit the nearest Honda Authorised Dealer for a FREE inspection and replacement if a defect is found.'
                  params = params + "partNo[]=" + response["items"][i]["partNo"];
                  color_label = "#cc0000;font-weight:600";
                  text_label = "<img src='img/warning-icon.svg'/ style='margin-right: 10px;width: 23px;height: 23px;'>" + actioncopy;
                  vinrequired = "required";
                  showDealer = 1;
                  affectCount++;
                } else if (response["items"][i]["status"].toLowerCase() == "not done " && response["items"][i]["name"] == "airbagD") {

                  actioncopy = 'Defective part needs to be replaced immediately. Please visit the nearest Honda Authorised Dealers for FREE Replacement.'
                  params = params + "partNo[]=" + response["items"][i]["partNo"];
                  color_label = "#cc0000;font-weight:600";
                  text_label = "<img src='img/warning-icon.svg'/ style='margin-right: 10px;width: 23px;height: 23px;'>" + actioncopy;
                  vinrequired = "required";
                  showDealer = 1;
                  affectCount++;
                } else if (response["items"][i]["status"].toLowerCase() == "not done" && response["items"][i]["name"] == "airbagD" && (response["items"][i]["year"].toLowerCase() != "1999" || response["items"][i]["year"].toLowerCase() != "2000")) {

                  actioncopy = 'Defective part needs to be replaced immediately. Please visit the nearest Honda Authorised Dealers for FREE Replacement.'
                  params = params + "partNo[]=" + response["items"][i]["partNo"];
                  color_label = "#cc0000;font-weight:600";
                  text_label = "<img src='img/warning-icon.svg'/ style='margin-right: 10px;width: 23px;height: 23px;'>" + actioncopy;
                  vinrequired = "required";
                  showDealer = 1;
                  affectCount++;
                } else if (response["items"][i]["status"].toLowerCase() == "not done" && response["items"][i]["name"] == "airbagP") {

                  actioncopy = 'Defective part needs to be replaced immediately. Please visit the nearest Honda Authorised Dealers for FREE Replacement.'
                  params = params + "partNo[]=" + response["items"][i]["partNo"];
                  color_label = "#cc0000;font-weight:600";
                  text_label = "<img src='img/warning-icon.svg'/ style='margin-right: 10px;width: 23px;height: 23px;'>" + actioncopy;
                  vinrequired = "required";
                  showDealer = 1;
                  affectCount++;
                } else if (response["items"][i]["status"].toLowerCase() == "not done" && response["items"][i]["name"] == "eps") {

                  actioncopy = 'Requires immediate inspection. Please visit the nearest Honda Authorised Dealers for FREE Inspection.'
                  params = params + "partNo[]=" + response["items"][i]["partNo"];
                  color_label = "#cc0000;font-weight:600";
                  text_label = "<img src='img/warning-icon.svg'/ style='margin-right: 10px;width: 23px;height: 23px;'>" + actioncopy;
                  vinrequired = "required";
                  showDealer = 1;
                  affectCount++;
                } else if (response["items"][i]["status"].toLowerCase() == "not done" && response["items"][i]["name"] == "ownerM") {

                  actioncopy = 'Your Owner’s Manual needs to be updated. Please visit the nearest Honda Authorised Dealer for FREE replacement.'
                  params = params + "partNo[]=" + response["items"][i]["partNo"];
                  color_label = "#cc0000;font-weight:600";
                  text_label = "<img src='img/warning-icon.svg'/ style='margin-right: 10px;width: 23px;height: 23px;'>" + actioncopy;
                  vinrequired = "required";
                  showDealer = 1;
                  affectCount++;
                } else if (response["items"][i]["status"].toLowerCase() == "ruptured") {
                  actioncopy = 'Defective part has been damaged upon collision. SRS module needs to be replaced to make the airbag fully functional. Please visit the nearest Honda Authorised Dealers for more information.'
                  params = params + "partNo[]=" + response["items"][i]["partNo"];
                  color_label = "#cc0000;font-weight:600";
                  text_label = "<img src='img/warning-icon.svg'/ style='margin-right: 10px;width: 23px;height: 23px;'>" + actioncopy;
                  vinrequired = "required";
                  showDealer = 1;
                  affectCount++;
                } else if ((response["items"][i]["status"].toLowerCase() == "modified") || (response["items"][i]["name"] == "preventiveD" && response["items"][i]["status"] == "Not Done M")) {
                  actioncopy = 'Defective part has been tampered with, and/or modified. Please visit the nearest Honda Authorised Dealers for replacement of your SRS module.'
                  params = params + "partNo[]=" + response["items"][i]["partNo"];
                  color_label = "#cc0000;font-weight:600";
                  text_label = "<img src='img/warning-icon.svg'/ style='margin-right: 10px;width: 23px;height: 23px;'>" + actioncopy;
                  vinrequired = "required";
                  showDealer = 1;
                  affectCount++;
                } else if (response["items"][i]["status"].toLowerCase() == "no information available") {
                  actioncopy = 'Please visit the nearest Honda Authorised Dealers for inspection.'
                  params = params + "partNo[]=" + response["items"][i]["partNo"];
                  color_label = "#cc0000;font-weight:600";
                  text_label = "<img src='img/warning-icon.svg'/ style='margin-right: 10px;width: 23px;height: 23px;'>" + actioncopy;
                  vinrequired = "required";
                  showDealer = 1;
                  affectCount++;
                } else if (response["items"][i]["status"].toLowerCase() == "not done" && (response["items"][i]["name"] == "preventiveD" || response["items"][i]["name"] == "preventiveP")) {
                  actioncopy = 'Preventive part needs to be installed immediately. Please visit the nearest Honda Authorised Dealer for Free replacement.'
                  params = params + "partNo[]=" + response["items"][i]["partNo"];
                  color_label = "#cc0000;font-weight:600";
                  text_label = "<img src='img/warning-icon.svg'/ style='margin-right: 10px;width: 23px;height: 23px;'>" + actioncopy;
                  vinrequired = "required";
                  showDealer = 1;
                  affectCount++;
                } else if (response["items"][i]["status"].toLowerCase() == "not done" && response["items"][i]["name"] == "gpknob") {
                  actioncopy = 'Please visit your nearest Honda Authorised Dealer for replacement.'
                  params = params + "partNo[]=" + response["items"][i]["partNo"];
                  color_label = "#cc0000;font-weight:600";
                  text_label = "<img src='img/warning-icon.svg'/ style='margin-right: 10px;width: 23px;height: 23px;'>" + actioncopy;
                  vinrequired = "required";
                  showDealer = 1;
                  affectCount++;
                } else if (response["items"][i]["status"].toLowerCase() == "not done" && (response["items"][i]["name"] == "engineBoltEarth" || response["items"][i]["name"] == "acgTerminalNut")) {
                  actioncopy = 'Part needs to be inspected. Please visit the nearest Honda Authorised Dealer.'
                  params = params + "partNo[]=" + response["items"][i]["partNo"];
                  color_label = "#cc0000;font-weight:600";
                  text_label = "<img src='img/warning-icon.svg'/ style='margin-right: 10px;width: 23px;height: 23px;'>" + actioncopy;
                  vinrequired = "required";
                  showDealer = 1;
                  affectCount++;
                } else if (response["items"][i]["status"].toLowerCase() == "not done" && (response["items"][i]["name"] == "softwareCamera" )) {
                  actioncopy = 'Software needs to be updated. Please visit the nearest Honda Authorised Dealer.'
                  params = params + "partNo[]=" + response["items"][i]["partNo"];
                  color_label = "#cc0000;font-weight:600";
                  text_label = "<img src='img/warning-icon.svg'/ style='margin-right: 10px;width: 23px;height: 23px;'>" + actioncopy;
                  vinrequired = "required";
                  showDealer = 1;
                  affectCount++;
                } else if (response["items"][i]["status"].toLowerCase() == "not done" && (response["items"][i]["name"] == "cameraReplacement" )) {
                  actioncopy = 'Camera needs to be replaced. Please visit the nearest Honda Authorised Dealer.'
                  params = params + "partNo[]=" + response["items"][i]["partNo"];
                  color_label = "#cc0000;font-weight:600";
                  text_label = "<img src='img/warning-icon.svg'/ style='margin-right: 10px;width: 23px;height: 23px;'>" + actioncopy;
                  vinrequired = "required";
                  showDealer = 1;
                  affectCount++;
                } else if (response["items"][i]["status"].toLowerCase() == "not done" && (response["items"][i]["name"] == "seatslideradjuster" )) {
                  actioncopy = 'Front seat slider adjuster needs to be replaced. Please visit the nearest Honda Authorised Dealer.'
                  params = params + "partNo[]=" + response["items"][i]["partNo"];
                  color_label = "#cc0000;font-weight:600";
                  text_label = "<img src='img/warning-icon.svg'/ style='margin-right: 10px;width: 23px;height: 23px;'>" + actioncopy;
                  vinrequired = "required";
                  showDealer = 1;
                  affectCount++;
                } else if (response["items"][i]["status"].toLowerCase() == "not done" && (response["items"][i]["name"] == "bos" )) {
                  actioncopy = 'Brake Operating Simulator needs to be replaced. Please visit the nearest Honda Authorised Dealer.'
                  params = params + "partNo[]=" + response["items"][i]["partNo"];
                  color_label = "#cc0000;font-weight:600";
                  text_label = "<img src='img/warning-icon.svg'/ style='margin-right: 10px;width: 23px;height: 23px;'>" + actioncopy;
                  vinrequired = "required";
                  showDealer = 1;
                  affectCount++;
                } else if (response["items"][i]["status"].toLowerCase() == "not done" && (response["items"][i]["name"] == "batteryDischarge" )) {
                  actioncopy = 'Software needs to be updated. Please visit the nearest Honda Authorised Dealer.'
                  params = params + "partNo[]=" + response["items"][i]["partNo"];
                  color_label = "#cc0000;font-weight:600";
                  text_label = "<img src='img/warning-icon.svg'/ style='margin-right: 10px;width: 23px;height: 23px;'>" + actioncopy;
                  vinrequired = "required";
                  showDealer = 1;
                  affectCount++;
                } else if (response["items"][i]["status"].toLowerCase() == "not done" && (response["items"][i]["name"] == "gbAssy" )) {
                  actioncopy = 'Part needs to be replaced. Please visit the nearest Honda Authorised Dealer.'
                  params = params + "partNo[]=" + response["items"][i]["partNo"];
                  color_label = "#cc0000;font-weight:600";
                  text_label = "<img src='img/warning-icon.svg'/ style='margin-right: 10px;width: 23px;height: 23px;'>" + actioncopy;
                  vinrequired = "required";
                  showDealer = 1;
                  affectCount++;
                } else if (response["items"][i]["status"].toLowerCase() == "not done" && (response["items"][i]["name"] == "LIBNTerminal" )) {
                  actioncopy = 'Part needs to be inspect. Please visit the nearest Honda Authorised Dealer.'
                  params = params + "partNo[]=" + response["items"][i]["partNo"];
                  color_label = "#cc0000;font-weight:600";
                  text_label = "<img src='img/warning-icon.svg'/ style='margin-right: 10px;width: 23px;height: 23px;'>" + actioncopy;
                  vinrequired = "required";
                  showDealer = 1;
                  affectCount++;
                } else if (response["items"][i]["status"].toLowerCase() == "not done" && (response["items"][i]["name"] == "GearBoxWormWheel" )) {
                  actioncopy = 'Steering Kit needs to be replaced. Please visit the nearest Honda Authorised Dealer.'
                  params = params + "partNo[]=" + response["items"][i]["partNo"];
                  color_label = "#cc0000;font-weight:600";
                  text_label = "<img src='img/warning-icon.svg'/ style='margin-right: 10px;width: 23px;height: 23px;'>" + actioncopy;
                  vinrequired = "required";
                  showDealer = 1;
                  affectCount++;
                } else if (response["items"][i]["status"].toLowerCase() == "not done" && (response["items"][i]["name"] == "HPFP" )) {
                  actioncopy = 'Part needs to be inspect. Please visit the nearest Honda Authorised Dealer.'
                  params = params + "partNo[]=" + response["items"][i]["partNo"];
                  color_label = "#cc0000;font-weight:600";
                  text_label = "<img src='img/warning-icon.svg'/ style='margin-right: 10px;width: 23px;height: 23px;'>" + actioncopy;
                  vinrequired = "required";
                  showDealer = 1;
                  affectCount++;
                }
				  
				  
				  else {
                  donecopy = 'Defective part has been replaced'
                  if (response["items"][i]["status"].toLowerCase() == "inspection done" && response["items"][i]["name"] == "eps") {
                    donecopy = 'Done – Inspection Completed'
                  } else if (response["items"][i]["model_preventive"].toLowerCase() == "cm4" && response["items"][i]["status"].toLowerCase() == "done" && response["items"][i]["name"] == "airbagD") {
                    donecopy = 'Defective part has been replaced<br><span style="color: #cc0000;font-weight:600;">Please check if your vehicle is involved in the "Preventive Driver\'s Airbag" product update below prior to servicing.</span>'

                  } else if (response["items"][i]["status"].toLowerCase() == "done" && (response["items"][i]["name"] == "preventiveD" || response["items"][i]["name"] == "preventiveP")) {
                    donecopy = 'Preventive part has been installed'
                  } else if (response["items"][i]["status"].toLowerCase() == "done a" && response["items"][i]["name"] == "airbagD") {
                    donecopy = 'Defective part has been replaced'
                  } else if (response["items"][i]["status"].toLowerCase() == "done p" && response["items"][i]["name"] == "airbagP") {
                    donecopy = 'Defective part has been replaced.<br><span style="color: #cc0000;font-weight:600;">It is advisable to check if your vehicle is involved in the "Preventive Passenger\'s Airbag" product below.'
                  } else if (response["items"][i]["status"].toLowerCase() == "done" && (response["items"][i]["name"] == "engineBoltEarth" || response["items"][i]["name"] == "acgTerminalNut")) {
                    donecopy = 'Part has been inspected and replaced.'
                  } else if (response["items"][i]["status"].toLowerCase() == "done" && (response["items"][i]["name"] == "softwareCamera" )) {
                    donecopy = 'Software has been updated.'
                  } else if (response["items"][i]["status"].toLowerCase() == "done" && (response["items"][i]["name"] == "cameraReplacement" )) {
                    donecopy = 'Camera has been replaced.'
                  } else if (response["items"][i]["status"].toLowerCase() == "done" && (response["items"][i]["name"] == "seatslideradjuster" )) {
                    donecopy = 'Front seat slider adjuster has been replaced.'
                  } else if (response["items"][i]["status"].toLowerCase() == "done" && (response["items"][i]["name"] == "batteryDischarge" )) {
                    donecopy = 'Software has been updated.'
                  } else if (response["items"][i]["status"].toLowerCase() == "done a" && response["items"][i]["name"] == "gbAssy") {
                    donecopy = 'Defective part has been replaced'
                  } 

					  

                  color_label = "green";
                  text_label = "<img src='img/ok-icon.svg'/ style='margin-right: 10px;width: 23px;height: 23px;'>" + donecopy;
                }



                $(".diagnosis").append("<tr><td style='-webkit-border-top-left-radius: 5px;-webkit-border-bottom-left-radius: 10px;-moz-border-radius-topleft: 10px;-moz-border-radius-bottomleft: 10px;border-top-left-radius: 10px;border-bottom-left-radius: 10px;'>" + productText[response["items"][i]["name"]] + "</td><td>" + response["items"][i]["partNo"] + "</td><td style='color:" + color_label + ";-webkit-border-top-right-radius: 10px;-webkit-border-bottom-right-radius: 10px;-moz-border-radius-topright: 10px;-moz-border-radius-bottomright: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 10px;'>" + text_label + "</td></tr>")
                product_type = product_type.concat(response["items"][i]["name"]);

                if ((color_label != "green") && (rpause) && (!noticeadded)) {
                  var pudnotice = "<div class='pudNotice052021' style='display:none;max-width: 530px;margin: 30px auto;'><p style='text-align: center;color: #000000;font-weight: bold;font-size: 17px;padding: 20px;background: #ffe953;'>Kindly book your appointment via <a href='https://www.honda.com.my/hondatouch/app' target='_blank' style='text-decoration: underline;color: #337ab7 !important;'>HondaTouch</a> app or contact the nearest <a href='https://www.honda.com.my/dealers' target='_blank' style='text-decoration: underline;color: #337ab7 !important;'>Honda Authorised Dealer</a> to replace your&nbsp;affected&nbsp;parts.</p></div>";
                  $(pudnotice).insertAfter(".diagnosis");
                  noticeadded = true;
                }


                if (i < response["items"].length - 2) {
                  product_type = product_type.concat(", ")
                  params = params + "&";
                } else if (i == (response["items"].length - 2)) {
                  product_type = product_type.concat(" and ")
                  params = params + "&";
                }
                if (response["items"][i]["status"].toLowerCase() != "done" && response["items"][i]["name"] == "airbagD") {
                  showHub = 1;
                }
              }
              $("#rowNum").html(affectCount);

              if ((affectCount == 0) || (rpause)) {

                $(".next-btn").fadeOut(function () {
                  $(".home-btn").css({
                    "pointer-events": "initial"
                  }).animate({
                    "opacity": "1"
                  })
                })
              }
              // $(".validvincontainer").show();
            } else {
              ga('send', 'event', 'Goal', 'vinSubmit', 'notRequired');
              // $(".notvalidvincontainer").show();
              $(".not-vin").html(passVinNo)
              $(".not-required, .not-required-bg").fadeIn();
              vinrequired = "not required";
              product_type = "";
            }

            if (showDealer) {
              $("#prefer-dealer").show();
            } else {
              $("#prefer-dealer").hide();
            }

            $("#show-stock").attr("href", "stock.php?" + params)

            // vinrequired = "required";
            if (showHub == 1) {
              // $(".mobile_hub_popup").fadeIn();
              // $(".productupdateoverlay").fadeIn();
            }


            $.ajax({
              type: "POST",
              url: "ajax/ajax_savevinrequired.php",
              data: {
                product_type: product_type,
                vin: $(".vininput").val().replace(/-/g, ""),
                vinrequired: vinrequired
              },
              cache: true,
              success: function (data) {

              }
            })
          }
        })
      }
    }
  })

  $(".special_select.productupdateselect ul li").click(function () {
    var obj = $(this)
    var data = obj.attr("data")
    //var selectID = obj.parent().parent().children('span').attr("id")
    var selectID = obj.parent().parent().children().children("span").attr("id")

    /*
    obj.parent().prev().children('span')
            .html(obj.text())
            .attr("data",obj.attr("data"))

    */
    var actualText = obj.text()
    actualText = (actualText.length > 20) ? actualText.substring(0, 20) + "..." : actualText;
    obj.parent().parent().children().children("span")
      .html(actualText)
      .attr("data", obj.attr("data"))

    //window.top.location.href="/dealers/dealers/"+data



    if (selectID == "state") {
      // $("#township").text("Select township")
      // $(".township_listing").css("visibility","hidden");
      // $("#townshipFor_"+data).css("visibility","visible");

      $("#dealerID").text("Select dealer")
      $(".dealers-i").hide()
      $(".dealerstate-" + $("#state").attr("data")).show()
    }

    if (selectID == "dealerID") {

      // $(".dealers-i").hide()
      // $(".dealerstate-"+$("#dealerID").attr("data")).show()
      $("#dealerIDsave").val($("#dealerID").attr("data"))
    }

    $("#h" + selectID).attr("value", data)
    //$("#townshipFor_"+data).show()

    var mainparentObj = obj.parent();
    if (mainparentObj.is(":visible")) {
      mainparentObj.slideUp("normal", function () {
        mainparentObj.removeClass("on")
      })
    }


  })


  var testEmail = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  var phonevalidation;
  var icvalidation;
  var dealerIDsavevalidation;
  var statesavevalidation;
  $(".updateemailform").submit(function () {
    var phoneval = $(".updatehpno").val();
    phoneval = phoneval.replace(/[^0-9]/g, '');
    if (phoneval.length >= 9 && phoneval.length <= 13) {
      phonevalidation = true;
    } else {
      phonevalidation = false;
    }
    // var dealerIDsave = $("#dealerIDsave").val();

    // if(dealerIDsave != "") { 
    //    dealerIDsavevalidation = true;
    // } else {
    //    dealerIDsavevalidation = false;      
    // }

    // var dealerStateID = $("#hstate").val();

    // if(dealerStateID != "") { 
    //    statesavevalidation = true;
    // } else {
    //    statesavevalidation = false;      
    // }

    // var icval = $(".updateic").val();
    // icval = icval.replace(/[^0-9]/g, '');   
    // if(icval.length == 12) { 
    //    icvalidation = true;
    // } else {
    //    icvalidation = false;      
    // }
    // var icval = $(".updateic").val();
    // icval = icval.replace(/[^0-9]/g, '');

    emailvalidation = true;

    if ($(".updateemail").val() == "" || !testEmail.test($(".updateemail").val())) {
      emailvalidation = false;
    }
    // if($(".updatename").val() != "" && testEmail.test($(".updateemail").val()) && phonevalidation && icvalidation &&  dealerIDsavevalidation &&  statesavevalidation && $(".updatecarregno").val() != ""){
    if ($(".updatename").val() != "" && emailvalidation && phonevalidation) {
      $(".productupdateoverlay").show();
      $(".loading_overlay").show();
      $.ajax({
        type: "POST",
        url: "ajax/ajax_sendproductupdateemail.php",
        data: {
          name: $(".updatename").val(),
          ic: "",
          // ic: $(".updateic").val(),
          hpno: $(".updatehpno").val(),
          carregno: "",
          // carregno: $(".updatecarregno").val(),              
          email: $(".updateemail").val(),

          product_type: product_type,
          vin: $(".vininput").val().replace(/-/g, ""),

          // dealerID: $("#dealerIDsave").val(),
          dealerName: dealerNameSubmit,
          dealerID: dealerID,
          // stateID: $("#hstate").val()
          stateID: ""
        },
        cache: true,
        success: function (data) {
          ga('send', 'event', 'Goal', 'emailSubmit', 'getThankYou');
          $(".productupdateoverlay").hide();
          $(".loading_overlay").hide();
          // alert("Thank you. Your details have successfully reached us. ");
          $("#ticketID").html(data);
          if ($(window).width() < 768) {
            $(".home-btn").css({
              "width": "auto",
              "right": "30px",
              "left": "30px"
            })
          }
          nextStep("step-4", "4", 5, 6)
          $(".validvincontainer,.productupdateoverlay").hide();
          $(".validvincontainer,.productupdateoverlay,.notvalidvincontainer,#show-pay-flow,.part_stock").hide();

          // $('.product_type :checked').removeAttr('checked');
          // $('.product_type').checked = false;
          // selectedBox.checked = false;
          // $('.product_type :checked').reset();

          $('input:checkbox').removeAttr('checked');
          $(".vininput").val("");
          $(".updatename").val("");
          $(".updatehpno").val("");
          $(".updateemail").val("");
        }
      })
    } else {
      // alert("Please Fill In The Form Properly.");
      $("#mobile-error").html("")
      $("#email-error").html("")
      $("#name-error").html("")

      if (!phonevalidation) {
        $("#mobile-error").html("Mobile Number is invalid")
      }
      if (!emailvalidation) {
        $("#email-error").html("Email is invalid")
      }
      if ($(".updatename").val() == "") {
        $("#name-error").html("Name is required")
      }
    }
  })

  $(".productupdatepopupclose").click(function () {
    $(".validvincontainer,.productupdateoverlay,.notvalidvincontainer,#show-pay-flow,.part_stock").hide();
    $(".product_header").html("<span></span>")
    $("#show-stock").attr("href", "/stock/index.html")
    product_type = "";
  })

});

function checkstock() {
  dealerID = $("#select_dealer").val();
  if (dealerID == 0) {
    $(".next-btn, .next-btn span").css({
      "color": "#dadada",
      "pointer-events": "none"
    })
    $(".stock-availability").hide();
  } else {
    dealerNameSubmit = $("#select_dealer option:selected").text();
    $("#additional_fields").hide()
    $("#not_eligible").hide()
    if (dealerID != 0) {
      $("#dealer_loader").show();
      $("#show-pay").hide()
      $("#show-stock").hide()
      $(".productupdateoverlay").show();
      $(".loading_overlay").show();
      $.ajax({
        type: "POST",
        url: "ajax/check_stock.php",
        data: {
          dealerID: dealerID,
          vin: $(".vininput").val().replace(/-/g, "")
        },
        cache: true,
        success: function (data) {
          $(".next-btn, .next-btn span").css({
            "color": "#cc0000",
            "pointer-events": "auto"
          })
          $(".productupdateoverlay").hide();
          $(".loading_overlay").hide();
          clickedDealer = 1;
          $("#dealer_loader").hide();
          $(".part_stock").hide();
          $(".stock-availability").show();
          $(".part_stock").html('<tr><th style="width: 65%;padding-left: 10px;">PARTS THAT REQUIRE REPLACEMENT</th><th class="align-right" style="width: 35%;padding-right: 10px;">STOCK AVAILABILITY</th></tr>')
          var showStock = false;
          var showPay = false;
          var showOldForm = false;
          for (var i = 0; i < data.length; i++) {
            if (data[i].elligible) {
              showPay = false;
            }
            if (data[i].partType == 'airbagD' && data[i].stock > 0) {
              showOldForm = false;
            }
            if (!(data[i].partType == 'airbagD' && data[i].stock == 0) && data[i].status.toLowerCase() != 'done') {
              showStock = true;
            }
            if (( /*data[i].partType != 'airbagD' && */ (data[i].stock == 0 || data[i].stock == null || data[i].stock == "null")) && showPay == false) {
              showOldForm = true;
            }
            if (data[i].stock == null || data[i].stock == "null") {
              data[i].stock = 0;
            }

            /*
              if (data[i].partType == "airbagD"){
                data[i].partType = "Driver's Airbag"
              }
              if (data[i].partType == "airbagP"){
                data[i].partType = "Passenger's Airbag"
              }
              if (data[i].partType == "battery"){
                data[i].partType = "12V Battery"
              }
              if (data[i].partType == "cvt"){
                data[i].partType = "CVT"
              }
              if (data[i].partType == "threeWay"){
                data[i].partType = "3 Way Joint Hose"
              }
              if (data[i].partType == "batteryS"){
                data[i].partType = "Battery Sensor"
              }
			  */
            // ----------------------------------------------------------------------- PART NAME FROM DB [SAI]

            data[i].partType = productText[data[i].partType];

            // ----------------------------------------------------------------------- PART NAME FROM DB [SAI]
            var stockNum = parseInt(data[i].stock);
            var stockMessage = "";
            if (stockNum <= 10) {
              stockMessage = "</td><td class='align-right' style='color:#cc0000;font-weight:600;padding-right: 20px;'>" + stockNum + "</td>";
            }
            if (stockNum > 10 && stockNum <= 50) {
              stockMessage = "</td><td class='align-right' style='color:#efb504;font-weight:600;padding-right: 20px;'>" + stockNum + "</td>";
            }
            if (stockNum > 50) {
              stockMessage = "</td><td class='align-right' style='color:#5ca200;font-weight:600;padding-right: 20px;'>" + stockNum + "</td>";
            }
            if (data[i].status.toLowerCase() != "done") {
              $(".part_stock").append("<tr><td>" + data[i].partType + "<br><span class='stock-part-id'>" + data[i].partNo + "</span></td>" + stockMessage + "</tr>")
            }
          }
          $(".part_stock").show();
          if (showPay) {
            $("#show-pay, #show-pay-flow").show()
          } else {
            $("#show-pay, #show-pay-flow").hide()
          }
          if (showStock) {
            $("#show-stock").show()
          } else {
            $("#show-stock").hide()
          }
          // if (showOldForm){
          //   $(".updateemailform").show()
          // } else {
          //   $(".updateemailform").hide()
          // }



        }
      })
    }
  }

}

var ownerAuth = 0;
var driverAuth = 0;
var authLetterAuth = 0;

$(".ownerName, .ownerIC").change(function () {
  if (($(".ownerName").val().length > 0) || ($(".ownerIC").val().length > 0)) {
    $("#mand_ownerName").show();
    $("#mand_ownerIC").show();
    $("#mand_upload_ownerIC").show();
    ownerAuth = 1;
    if ((($(".ownerName").val().length > 0) || ($(".ownerIC").val().length > 0)) && (($(".driverName").val().length > 0) || ($(".driverIC").val().length > 0))) {
      $("#mand_upload_authLetter").show();
      authLetterAuth = 1;
    }
  } else {
    $("#mand_ownerName").hide();
    $("#mand_ownerIC").hide();
    $("#mand_upload_ownerIC").hide();
    $("#mand_upload_authLetter").hide();
    ownerAuth = 0;
    authLetterAuth = 0;
  }
});

$(".driverName, .driverIC").change(function () {
  if (($(".driverName").val().length > 0) || ($(".driverIC").val().length > 0)) {
    $("#mand_driverName").show();
    $("#mand_driverIC").show();
    $("#mand_upload_driverIC").show();
    driverAuth = 1;
    if ((($(".ownerName").val().length > 0) || ($(".ownerIC").val().length > 0)) && (($(".driverName").val().length > 0) || ($(".driverIC").val().length > 0))) {
      $("#mand_upload_authLetter").show();
      authLetterAuth = 1;
    }
  } else {
    $("#mand_driverName").hide();
    $("#mand_driverIC").hide();
    $("#mand_upload_driverIC").hide();
    $("#mand_upload_authLetter").hide();
    driverAuth = 0;
    authLetterAuth = 0;
  }
});

$('.fileUpload').bind('change', function () {
  if (this.files[0].size > 800000) {
    alert("Warning! Maximum file size is 800kb!")
    this.value = "";
  }
});

$("#checkPUDform").click(function () {
  var atpos = $(".email").val().indexOf("@");
  var dotpos = $(".email").val().lastIndexOf(".");

  if (ownerAuth == 0 && driverAuth == 0) {
    alert("No owner or driver detail is filled!")
  } else if ($(".ownerName").val().length == 0) {
    alert("Owner Name is empty")
  } else if ($(".ownerIC").val().length == 0) {
    alert("Owner IC is empty")
  } else if (driverAuth == 1 && $(".driverName").val().length == 0) {
    alert("Driver Name is empty")
  } else if (driverAuth == 1 && $(".driverIC").val().length == 0) {
    alert("Driver IC is empty")
  } else if ($(".address").val().length == 0) {
    alert("Address is empty")
  } else if ($(".carNo").val().length == 0) {
    alert("Car No. is empty")
  } else if ($(".vinNo").val().length == 0) {
    alert("Vin No. is empty")
  } else if ($(".mobileNo").val().length == 0) {
    alert("Mobile No. is empty")
  } else if ($(".mobileNo").val().match(/[a-z]/i)) {
    alert("Mobile No. is invalid")
  } else if ($(".email").val().length == 0) {
    alert("Email is empty")
  } else if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= $(".email").val().length) {
    alert("Email is not valid")
  } else if ($(".bankName").val() == 0) {
    alert("Bank is not selected")
  } else if ($(".bankNo").val().length == 0) {
    alert("Bank Account No. is empty")
  } else if ($("#select_dealer_form").val() == 0) {
    alert("Dealer is not selected")
  } else if (ownerAuth == 1 && document.getElementById("f1").files.length == 0) {
    alert("Owner MyKad attachment is not uploaded")
  } else if (driverAuth == 1 && document.getElementById("f2").files.length == 0) {
    alert("Driver MyKad attachment is not uploaded")
  } else if (document.getElementById("f3").files.length == 0) {
    alert("Vehicle Grant is not uploaded")
  } else if (authLetterAuth == 1 && document.getElementById("f4").files.length == 0) {
    alert("Authorization Letter attachment is not uploaded")
  } else if (document.getElementById("f5").files.length == 0) {
    alert("Bank Account Copy is not uploaded")
  } else if ($(".finalName").val().length == 0) {
    alert("Name at Signature section is empty")
  } else if (!$("#radio_owner").is(':checked') && !$("#radio_rep").is(':checked')) {
    alert("No owner or representative is selected at Signature section")
  } else if ($(".finalCarNo").val().length == 0) {
    alert("Car No. at Signature section is empty")
  } else if (ownerAuth == 1 && document.getElementById("ok_ownerIC").checked == false) {
    alert("Owner Verification is not checked!")
  } else if (driverAuth == 1 && document.getElementById("ok_driverIC").checked == false) {
    alert("Driver Verification is not checked!")
  } else if (document.getElementById("ok_grant").checked == false) {
    alert("Vehicle Grant is not checked!")
  } else if (authLetterAuth == 1 && document.getElementById("ok_authLetter").checked == false) {
    alert("Authorization Letter Verification is not checked!")
  } else if (document.getElementById("ok_bankProof").checked == false) {
    alert("Account Book Copy is not checked!")
  } else if (document.getElementById("ok_tnc").checked == false) {
    alert("You need to agree with the Terms and Conditions to continue.")
  } else {
    //submit

    $("#confirm_1").html($(".ownerName").val());
    $("#confirm_2").html($(".ownerIC").val());
    $("#confirm_3").html($(".driverName").val());
    $("#confirm_4").html($(".driverIC").val());
    $("#confirm_5").html($(".address").val());
    $("#confirm_6").html($(".carNo").val());
    $("#confirm_7").html($(".vinNo").val());
    $("#confirm_8").html($(".mobileNo").val());
    $("#confirm_9").html($(".email").val());
    $("#confirm_10").html($(".bankName").val());
    $("#confirm_11").html($(".bankNo").val());
    var e = document.getElementById("select_dealer_form");
    var dealerName = e.options[e.selectedIndex].text;
    $("#confirm_12").html(dealerName);
    $("#confirm_13").html($('#f1').val().split('\\').pop());
    $("#confirm_14").html($('#f2').val().split('\\').pop());
    $("#confirm_15").html($('#f3').val().split('\\').pop());
    $("#confirm_16").html($('#f4').val().split('\\').pop());
    $("#confirm_17").html($('#f5').val().split('\\').pop());
    $("#confirm_18").html($(".finalName").val())
    $("#confirm_19").html($('input[name="person"]:checked').val())
    $("#confirm_20").html($(".finalCarNo").val())


    $(".check_popup").fadeIn()

    // $( "#formSubmit" ).trigger( "click" );


    // $.ajax({
    //   type:"POST",
    //   url: "ajax/submitPUDform.php",
    //   data: {
    //     ownerName: $(".ownerName").val(),
    //     ownerIC: $(".ownerIC").val(),
    //     driverName: $(".driverName").val(),
    //     driverIC: $(".driverIC").val(),
    //     address: $(".address").val(),
    //     carNo: $(".carNo").val(),
    //     vinNo: $(".vinNo").val(),
    //     mobileNo: $(".mobileNo").val(),
    //     email: $(".email").val(),
    //     bankName: $(".bankName").val(),
    //     bankNo: $(".bankNo").val(),
    //     dealerName: dealerName,
    //     finalName: $(".finalName").val(),
    //     person: $('input[name="person"]:checked').val(),
    //     finalCarNo: $(".finalCarNo").val()
    //   },
    //   cache:true,
    //   success:function(data){
    //     // alert(data);
    //     mess1='Your submission is successful. Press Ok to redirect to homepage.';  
    //     math=99;  
    //     x = confirm(mess1);   
    //     if (x == true)  
    //     {  
    //     window.location.href = "index.php";
    //     }  
    //     else  
    //     {  
    //close 
  }

})

$("#closeCheckPUDform").click(function () {
  $(".check_popup").fadeOut()
})

$("#submitPUDform").click(function () {
  $("#formSubmit").trigger("click");
})

$(document).ready(function () {

  // listen for deeplink

  var url = window.location.href
  var hash = url.split('#')[1];

  if (hash != undefined) {

    hash = hash.replace('/', '');
    switch (hash) {
      case 'howto':
        $('.start-btn').trigger('click')
        $('.dont-know-vin').trigger('click')
        break;

      default:
    }
  }


})
