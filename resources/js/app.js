import "./bootstrap";

import Alpine from "alpinejs";
import mask from "@alpinejs/mask";
import axios from "axios";
import Swiper from "swiper/bundle";
import Toastify from "toastify-js";
require("./meal");
import "toastify-js/src/toastify.css";
import "swiper/css/bundle";
import { drop, forEach } from "lodash";

const swiper = new Swiper(".swiper", {
  // Parameters
  direction: "horizontal",
  // loop: true,
  spaceBetween: 12,
  slidesPerView: 4,
  autoplay: {
    delay: 5000,
    disableOnInteraction: false,
  },

  // Pagination
  pagination: {
    el: ".swiper-pagination",
  },

  // Navigation arrows
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },

  breakpoints: {
    1024: {
      direction: "horizontal",
      loop: true,
      spaceBetween: 24,
      slidesPerView: 4,

      // Pagination
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },

      // Navigation arrows
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    },

    768: {
      direction: "horizontal",
      // loop: true,
      spaceBetween: 9,
      slidesPerView: 3,

      // Pagination
      pagination: {
        el: ".swiper-pagination",
      },

      // Navigation arrows
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    },

    425: {
      direction: "horizontal",
      // loop: true,
      spaceBetween: 4,
      slidesPerView: 2,

      // Pagination
      pagination: {
        el: ".swiper-pagination",
      },

      // Navigation arrows
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    },

    320: {
      direction: "horizontal",
      // loop: true,
      // spaceBetween: 4,
      slidesPerView: 1,
    },
  },
});

Alpine.plugin(mask);
window.Alpine = Alpine;

Alpine.start();

let cart = JSON.parse(localStorage.getItem("cart"));

if (cart == null || Object.keys(cart).length == 0) {
  document.querySelectorAll(".cart").forEach((el) => {
    el.textContent = "0";
  });
  if(cart == null || cart == undefined) {
    let newCart = {};
    localStorage.setItem("cart", JSON.stringify(newCart))
  }
} else {
  document.querySelectorAll(".cart").forEach((el) => {
    el.textContent = Object.values(cart).reduce(
      (accumulator, currentValue) => accumulator + currentValue
    );
  });
}

const searchBars = document.querySelectorAll("#searchbar");
const searchBtns = document.querySelectorAll("#search");

searchBars.forEach((searchBar) => {
  if (searchBar != null) {
    searchBar.addEventListener("keydown", (e) => {
      if (e.keyCode === 13) {
        let checkBoxes = document
          .querySelector("#cities")
          ?.querySelectorAll("input");
        if (searchBar.value != "") {
          let url = new URL(window.location.href);
          if (url.pathname == "/search") {
            url.searchParams.set("keyword", searchBar.value);
            if (checkBoxes) {
              let cities = [];

              checkBoxes.forEach((el) => {
                if (el.checked) {
                  cities.push(el.id);
                }
              });

              if (
                url.searchParams.has("category") &&
                cities.length == 0
              ) {
                url.searchParams.delete("category");
              }
            }

            window.location.href = url.href;
          } else {
            window.location.href = `/search?keyword=${searchBar.value}`;
          }
        } else {
          Toastify({
            text: "حقل الإدخال فارغ",
            duration: 2000,
            close: true,
            gravity: "bottom",
            position: "right",
            style: {
              background: "rgb(202 138 4)",
              color: "white",
            },
            offset: {
              x: 10,
            },
            onClick: function () {
              searchBar.focus();
              searchBar.parentElement.classList.add(
                "invalid-anim"
              );
              setTimeout(() => {
                searchBar.parentElement.classList.remove(
                  "invalid-anim"
                );
              }, "1000");
            },
          }).showToast();
        }
      }
    });
  }
});

searchBtns.forEach((searchBtn) => {
  if (searchBtn != null) {
    searchBtn.addEventListener("click", function () {
      let checkBoxes = document
        .querySelector("#cities")
        ?.querySelectorAll("input");
      if (searchBtn.parentElement.childNodes[3].value != "") {
        let url = new URL(window.location.href);
        if (url.pathname == "/search") {
          url.searchParams.set(
            "keyword",
            searchBtn.parentElement.childNodes[3].value
          );

          if (checkBoxes) {
            let cities = [];

            checkBoxes.forEach((el) => {
              if (el.checked) {
                cities.push(el.id);
              }
            });

            if (
              url.searchParams.has("category") &&
              cities.length == 0
            ) {
              url.searchParams.delete("category");
            }
          }

          window.location.href = url.href;
        } else {
          window.location.href = `/search?keyword=${searchBtn.parentElement.childNodes[3].value}`;
        }
      } else {
        Toastify({
          text: "حقل الإدخال فارغ",
          duration: 2000,
          close: true,
          gravity: "bottom",
          position: "right",
          style: {
            background: "rgb(202 138 4)",
            color: "white",
          },
          offset: {
            x: 10,
          },
          onClick: function () {
            searchBtn.parentElement.childNodes[3].focus();
            searchBtn.parentElement.classList.add("invalid-anim");
            setTimeout(() => {
              searchBtn.parentElement.classList.remove(
                "invalid-anim"
              );
            }, "1000");
          },
        }).showToast();
      }
    });
  }
});

const temp = document.querySelector("#cities");
let checkBoxes;
if (temp != null) {
  checkBoxes = temp.querySelectorAll("input");
}

if (temp != null && checkBoxes.length != 0) {
  document
    .querySelector("#categorySearch")
    .addEventListener("click", function (e) {
      let cities = [];

      checkBoxes.forEach((el) => {
        if (el.checked) {
          cities.push(el.id);
        }
      });

      if (cities.length == 0) {
        Toastify({
          text: "ليس هناك أي أصناف قد قمت باختيارها",
          duration: 2000,
          close: true,
          gravity: "bottom",
          position: "left",
          style: {
            background: "rgb(202 138 4)",
            color: "white",
          },
          offset: {
            x: 10,
          },
        }).showToast();
      } else {
        let url = new URL(window.location.href);
        let temp = [];
        searchBars.forEach((el) => {
          if (el.value != "") {
            temp.push(el);
          }
        });
        if (temp.length == 1 && url.searchParams.has("keyword")) {
          url.searchParams.delete("keyword");
        }
        url.searchParams.set("category", cities);
        window.location.href = url.href;
      }
    });

  let url = new URL(window.location.href).searchParams
    .get("category")
    ?.split(",");
  if (url) {
    url.forEach((category) => {
      checkBoxes[category - 1].checked = true;
    });
  }
}

let url = new URL(window.location.href);
if (url.searchParams.has("keyword")) {
  searchBars.forEach((searchBar) => {
    searchBar.value = url.searchParams.get("keyword");
  });
}

document.querySelectorAll(".meal").forEach((el) => {
  el.addEventListener("click", function (e) {
    if (e.target.tagName.toLowerCase() == "button") {
      let newCart = JSON.parse(localStorage.getItem("cart"));
      if (newCart == null || Object.keys(newCart).length == 0) {
        newCart = {};
      }
      let meal_id = e.target.closest(".meal").id;
      if (meal_id in newCart) {
        newCart[meal_id]++;
      } else {
        newCart[meal_id] = 1;
      }

      document.querySelectorAll(".cart").forEach((el) => {
        el.textContent = Object.values(newCart).reduce(
          (accumulator, currentValue) => accumulator + currentValue
        );
      });
      localStorage.setItem("cart", JSON.stringify(newCart));
    } else {
      if (e.target.id) {
        window.location.href = `/meal/${e.target.id}`;
      } else {
        window.location.href = `/meal/${e.target.closest(".meal").id}`;
      }
    }
  });
});

let addToCartBtn = document.querySelector(".add_to_cart");

if (addToCartBtn != null) {
  addToCartBtn.addEventListener("click", function () {
    let newCart = JSON.parse(localStorage.getItem("cart"));
    if (newCart == null || Object.keys(newCart).length == 0) {
      newCart = {};
    }
    let meal_id = addToCartBtn.id;
    if (meal_id in newCart) {
      newCart[meal_id] =
        newCart[meal_id] + +document.querySelector("#qty").value;
    } else {
      newCart[meal_id] = +document.querySelector("#qty").value;
    }

    document.querySelectorAll(".cart").forEach((el) => {
      el.textContent = Object.values(newCart).reduce(
        (accumulator, currentValue) => accumulator + currentValue
      );
    });
    localStorage.setItem("cart", JSON.stringify(newCart));
  });
}

if (document.URL.includes("/cart")) {
  // Here goes pc code
  let newCart = JSON.parse(localStorage.getItem("cart"));
  let meals = Object.keys(newCart);
  let placeOrderContainer = document.querySelector(".place-order-container");
  let total = 0;
  let mealQuantities = Object.entries(
    JSON.parse(localStorage.getItem("cart"))
  );
  if(mealQuantities.length == 0) {
    document.querySelector(".products").innerHTML = `<h1 class="text-4xl text-yellow-600 text-center pb-4 lg:pb-8 shadow-sm">سلة المشتريات فارغة</h1>`;
  } else {
    axios.post("/getCartMeals", {
        meals: JSON.stringify(meals),
      })
      .then(function (response) {
        mealQuantities.forEach((meal) => {
          let currentMeal = response.data.find((x) => x.id == meal[0]);
          total += Math.trunc(+meal[1] * +currentMeal.price);
          // Here goes PC html
          document.querySelector("tbody").insertAdjacentHTML(
            "beforeend",
            `<tr class="border-b">
              <td class="p-4 border-l border-r"><a href="/meal/${currentMeal.id
              }" class="hover:text-yellow-600 hover:scale-110 transition-all">${currentMeal.title
              }</a></td>
              <td class="p-4 border-l singularPrice">${Math.trunc(currentMeal.price)} ل.س</td>
              <td class="p-4 border-l">
                <div class="flex justify-center items-center gap-2">
                  <div id="${meal[0]}" class="flex justify-center items-center">
                    <button id="plus-sign" class="border border-[#6b7280] border-l-0 rounded-r-full font-bold py-[8px] px-[12px]">+</button>
                    <input type="number" name="qty" id="qty" value="${meal[1]}" class="w-12 text-center" min="1" max="20">
                    <button id="negative-sign" class="border border-[#6b7280] border-r-0 rounded-l-full font-bold py-[8px] px-[12px]">-</button>
                  </div>
                </div>
              </td>
              <td class="p-4 border-l total">${Math.trunc(+meal[1] * +currentMeal.price)} ل.س</td>
              <td id="${meal[0]}" class="removebtn border-l cursor-pointer text-center hover:bg-yellow-600 hover:text-white transition-all">حذف</td>
            </tr>`
          );
          // Here goes mobile html
          document.querySelector(".mobile-container").insertAdjacentHTML(
            "beforeend",
            `<div class="flex flex-col justify-around items-center w-full border shadow-md rounded-md px-2 py-4 gap-4">
              <div class="flex gap-4 w-full">
                <a href="/meal/${currentMeal.id}" class="text-yellow-600">الاسم: <span class="text-black">${currentMeal.title}</span></a>
              </div>
              <div class="flex gap-4 w-full">
              <p class="text-yellow-600 singularPrice">السعر: <span class="text-black">${Math.trunc(currentMeal.price)} ل.س</span></p>
                <p class="text-yellow-600 total">الإجمالي: <span class="text-black">${Math.trunc(+meal[1] * +currentMeal.price)} ل.س</span></p>
              </div>
              <div class="flex justify-between w-full">
              <div class="text-yellow-600 flex justify-center items-center">
              <div>الكمية:</div>
              <div id="${currentMeal.id}" class="flex justify-center items-center mr-4">
                <button id="plus-sign" class="border border-[#6b7280] border-l-0 rounded-r-full font-bold py-[5px] px-[12px]">+</button>
                <input type="number" name="qty" id="qty" value="${meal[1]}" class="w-12 h-[36px] text-center" min="1" max="20">
                <button id="negative-sign" class="border border-[#6b7280] border-r-0 rounded-l-full font-bold py-[5px] px-[12px]">-</button>
              </div>
              </div>
              <p id="${currentMeal.id}" class="text-yellow-600 underline ml-4 cursor-pointer removebtnmobile">حذف</p>
              </div>
            </div>`
          )
        });
        let totalField = placeOrderContainer.querySelector(".total");
        if (totalField) {
          totalField.textContent = total;
        }
        document.querySelector("tbody").insertAdjacentHTML(
          "beforeend",
          `<tr>
            <td colspan="4"></td>
            <td id="4" class="removeAllBtn p-6 border cursor-pointer text-center hover:bg-yellow-600 hover:text-white transition-all">حذف كل المنتجات</td>
          </tr>`
        );

        document.querySelector(".mobile-container").insertAdjacentHTML(
          "beforeend",
          `<div class="flex flex-col justify-around items-center w-full px-2 py-4 gap-4">
          <p id="2" class="text-yellow-600 underline mx-auto cursor-pointer removeAllBtnmobile">حذف كل المنتجات</p>
          </div>`
        )
      })
      .catch(function (error) {
        console.log(error);
        Toastify({
          text: "حصل خطأ ما، يرجى المحاولة لاحقاً",
          duration: 2000,
          close: true,
          gravity: "bottom",
          position: "left",
          style: {
            background: "rgb(202 138 4)",
            color: "white",
          },
          offset: {
            x: 10,
          },
        }).showToast();
      });
  }

  document.querySelector("tbody")?.addEventListener("click", function (e) {
    if (e.target.classList.contains("removebtn")) {
      const meal_id = e.target.id;
      let newCart = JSON.parse(localStorage.getItem("cart"));
      delete newCart[meal_id];
      localStorage.setItem("cart", JSON.stringify(newCart));
      e.target.parentNode.remove();
      if (newCart == null || Object.keys(newCart).length == 0) {
        document.querySelectorAll(".cart").forEach((el) => {
          el.textContent = "0";
        });
        document.querySelector(".products").innerHTML = `<h1 class="text-4xl text-yellow-600 text-center pb-4 lg:pb-8 shadow-sm">سلة المشتريات فارغة</h1>`;
      } else {
        document.querySelectorAll(".cart").forEach((el) => {
          el.textContent = Object.values(newCart).reduce(
            (accumulator, currentValue) =>
              accumulator + currentValue
          );
        });
        let total = 0;
        document.querySelectorAll("tbody .total").forEach(currentTotal => {
          total += +currentTotal.textContent.replace(" ل.س", "");
        })
        placeOrderContainer.querySelector(".total").textContent = total;
      }
    } else if (e.target.id == "negative-sign") {
      let QtyField = e.target.parentNode.querySelector("#qty");
      if (QtyField.value > 1) {
        QtyField.value--;
        let meal_id = e.target.parentNode.id;
        let newCart = JSON.parse(localStorage.getItem("cart"));
        newCart[meal_id]--;
        localStorage.setItem("cart", JSON.stringify(newCart));
        if (newCart == null || Object.keys(newCart).length == 0) {
          document.querySelectorAll(".cart").forEach((el) => {
            el.textContent = "0";
          });
        } else {
          document.querySelectorAll(".cart").forEach((el) => {
            el.textContent = Object.values(newCart).reduce(
              (accumulator, currentValue) =>
                accumulator + currentValue
            );
          });
        }
        let currentTotal = e.target.parentNode.parentNode.parentNode.parentNode.querySelector(".total");
        let quantity = e.target.parentNode.querySelector("#qty");
        let singularPrice = e.target.parentNode.parentNode.parentNode.parentNode.querySelector(".singularPrice");

        currentTotal.textContent = `${+quantity.value * +singularPrice.textContent.replace(" ل.س", "")} ل.س`;
        let total = 0;
        document.querySelectorAll("tbody .total").forEach(currentTotal => {
          total += +currentTotal.textContent.replace(" ل.س", "");
        })
        placeOrderContainer.querySelector(".total").textContent = total;
      }
    } else if (e.target.id == "plus-sign") {
      let QtyField = e.target.parentNode.querySelector("#qty");
      if (QtyField.value < 20) {
        QtyField.value++;
        let meal_id = e.target.parentNode.id;
        let newCart = JSON.parse(localStorage.getItem("cart"));
        newCart[meal_id]++;
        localStorage.setItem("cart", JSON.stringify(newCart));
        if (newCart == null || Object.keys(newCart).length == 0) {
          document.querySelectorAll(".cart").forEach((el) => {
            el.textContent = "0";
          });
        } else {
          document.querySelectorAll(".cart").forEach((el) => {
            el.textContent = Object.values(newCart).reduce(
              (accumulator, currentValue) =>
                accumulator + currentValue
            );
          });
        }
        let currentTotal = e.target.parentNode.parentNode.parentNode.parentNode.querySelector(".total");
        let quantity = e.target.parentNode.querySelector("#qty");
        let singularPrice = e.target.parentNode.parentNode.parentNode.parentNode.querySelector(".singularPrice");

        currentTotal.textContent = `${+quantity.value * +singularPrice.textContent.replace(" ل.س", "")} ل.س`;
        let total = 0;
        document.querySelectorAll("tbody .total").forEach(currentTotal => {
          total += +currentTotal.textContent.replace(" ل.س", "");
        })
        placeOrderContainer.querySelector(".total").textContent = total;
      }
    } else if (e.target.classList.contains("removeAllBtn")) {
      // empty cart local storage and empty cart page
      let newCart = {};
      localStorage.setItem("cart", JSON.stringify(newCart));
      document.querySelectorAll(".cart").forEach((el) => {
        el.textContent = "0";
      });
      document.querySelector(".products").innerHTML = `<h1 class="text-4xl text-yellow-600 text-center pb-4 lg:pb-8 shadow-sm">سلة المشتريات فارغة</h1>`;
      Toastify({
        text: "تم إفراغ سلة المشتريات بنجاح",
        duration: 3000,
        close: true,
        gravity: "bottom",
        position: "left",
        style: {
          background: "rgb(202 138 4)",
          color: "white",
        },
        offset: {
          x: 10,
        },
      }).showToast();
    }
  });

  document.querySelector("tbody")?.addEventListener("input", function (e) {
    if (e.target.id == "qty") {
      if (e.target.value.length > 2) {
        e.target.value = e.target.value.slice(0, 2);
        let meal_id = e.target.parentNode.id;
        let newCart = JSON.parse(localStorage.getItem("cart"));
        newCart[meal_id] = e.target.value.slice(0, 2);
        localStorage.setItem("cart", JSON.stringify(newCart));
        if (newCart == null || Object.keys(newCart).length == 0) {
          document.querySelectorAll(".cart").forEach((el) => {
            el.textContent = "0";
          });
        } else {
          document.querySelectorAll(".cart").forEach((el) => {
            el.textContent = Object.values(newCart).reduce(
              (accumulator, currentValue) =>
                accumulator + currentValue
            );
          });
        }
      }

      if (e.target.value == "" || e.target.value == 0) {
        e.target.value = 1;
        let meal_id = e.target.parentNode.id;
        let newCart = JSON.parse(localStorage.getItem("cart"));
        newCart[meal_id] = 1;
        localStorage.setItem("cart", JSON.stringify(newCart));
        if (newCart == null || Object.keys(newCart).length == 0) {
          document.querySelectorAll(".cart").forEach((el) => {
            el.textContent = "0";
          });
        } else {
          document.querySelectorAll(".cart").forEach((el) => {
            el.textContent = Object.values(newCart).reduce(
              (accumulator, currentValue) =>
                accumulator + currentValue
            );
          });
        }
      }

      if (e.target.value > 20) {
        e.target.value = 20;
        let meal_id = e.target.parentNode.id;
        let newCart = JSON.parse(localStorage.getItem("cart"));
        newCart[meal_id] = 20;
        localStorage.setItem("cart", JSON.stringify(newCart));
        if (newCart == null || Object.keys(newCart).length == 0) {
          document.querySelectorAll(".cart").forEach((el) => {
            el.textContent = "0";
          });
        } else {
          document.querySelectorAll(".cart").forEach((el) => {
            el.textContent = Object.values(newCart).reduce(
              (accumulator, currentValue) =>
                accumulator + currentValue
            );
          });
        }
      }

      if (e.target.value <= 20 && e.target.value >= 1) {
        let meal_id = e.target.parentNode.id;
        let newCart = JSON.parse(localStorage.getItem("cart"));
        newCart[meal_id] = +e.target.value;
        localStorage.setItem("cart", JSON.stringify(newCart));
        if (newCart == null || Object.keys(newCart).length == 0) {
          document.querySelectorAll(".cart").forEach((el) => {
            el.textContent = "0";
          });
        } else {
          document.querySelectorAll(".cart").forEach((el) => {
            el.textContent = Object.values(newCart).reduce(
              (accumulator, currentValue) =>
                accumulator + currentValue
            );
          });
        }
        let currentTotal = e.target.parentNode.parentNode.parentNode.parentNode.querySelector(".total");
        let quantity = e.target.parentNode.querySelector("#qty");
        let singularPrice = e.target.parentNode.parentNode.parentNode.parentNode.querySelector(".singularPrice");

        currentTotal.textContent = `${+quantity.value * +singularPrice.textContent.replace(" ل.س", "")} ل.س`;
        let total = 0;
        document.querySelectorAll("tbody .total").forEach(currentTotal => {
          total += +currentTotal.textContent.replace(" ل.س", "");
        })
        placeOrderContainer.querySelector(".total").textContent = total;
      }
    }
  });

  document.querySelector(".mobile-container")?.addEventListener("click", function(e) {
    if(e.target.classList.contains("removebtnmobile")) {
      const meal_id = e.target.id;
      let newCart = JSON.parse(localStorage.getItem("cart"));
      delete newCart[meal_id];
      localStorage.setItem("cart", JSON.stringify(newCart));
      e.target.parentNode.parentNode.remove();
      if (newCart == null || Object.keys(newCart).length == 0) {
        document.querySelectorAll(".cart").forEach((el) => {
          el.textContent = "0";
        });
        document.querySelector(".products").innerHTML = `<h1 class="text-4xl text-yellow-600 text-center pb-4 lg:pb-8 shadow-sm">سلة المشتريات فارغة</h1>`;
      } else {
        document.querySelectorAll(".cart").forEach((el) => {
          el.textContent = Object.values(newCart).reduce(
            (accumulator, currentValue) =>
              accumulator + currentValue
          );
        });
        let total = 0;
        document.querySelectorAll(".mobile-container .total span").forEach(currentTotal => {
          total += +currentTotal.textContent.replace(" ل.س", "");
        })
        placeOrderContainer.querySelector(".total").textContent = total;
      }
    } else if(e.target.id == "plus-sign") {
      let QtyField = e.target.parentNode.querySelector("#qty");
      if (QtyField.value < 20) {
        QtyField.value++;
        let meal_id = e.target.parentNode.id;
        let newCart = JSON.parse(localStorage.getItem("cart"));
        newCart[meal_id]++;
        localStorage.setItem("cart", JSON.stringify(newCart));
        if (newCart == null || Object.keys(newCart).length == 0) {
          document.querySelectorAll(".cart").forEach((el) => {
            el.textContent = "0";
          });
        } else {
          document.querySelectorAll(".cart").forEach((el) => {
            el.textContent = Object.values(newCart).reduce(
              (accumulator, currentValue) =>
                accumulator + currentValue
            );
          });
        }
        let currentTotal = e.target.parentNode.parentNode.parentNode.parentNode.querySelector(".total");
        let quantity = e.target.parentNode.querySelector("#qty");
        let singularPrice = e.target.parentNode.parentNode.parentNode.parentNode.querySelector(".singularPrice");

        currentTotal.innerHTML = `الإجمالي: <span class="text-black">${+quantity.value * +singularPrice.textContent.replace(" ل.س", "").replace("السعر: ", "")} ل.س</span>`;

        let total = 0;
        document.querySelectorAll(".mobile-container .total span").forEach(currentTotal => {
          total += +currentTotal.textContent.replace(" ل.س", "");
        })
        placeOrderContainer.querySelector(".total").textContent = total;
      }
    } else if(e.target.id == "negative-sign") {
      let QtyField = e.target.parentNode.querySelector("#qty");
      if (QtyField.value > 1) {
        QtyField.value--;
        let meal_id = e.target.parentNode.id;
        let newCart = JSON.parse(localStorage.getItem("cart"));
        newCart[meal_id]--;
        localStorage.setItem("cart", JSON.stringify(newCart));
        if (newCart == null || Object.keys(newCart).length == 0) {
          document.querySelectorAll(".cart").forEach((el) => {
            el.textContent = "0";
          });
        } else {
          document.querySelectorAll(".cart").forEach((el) => {
            el.textContent = Object.values(newCart).reduce(
              (accumulator, currentValue) =>
                accumulator + currentValue
            );
          });
        }
        let currentTotal = e.target.parentNode.parentNode.parentNode.parentNode.querySelector(".total");
        let quantity = e.target.parentNode.querySelector("#qty");
        let singularPrice = e.target.parentNode.parentNode.parentNode.parentNode.querySelector(".singularPrice");

        currentTotal.innerHTML = `الإجمالي: <span class="text-black">${+quantity.value * +singularPrice.textContent.replace(" ل.س", "").replace("السعر: ", "")} ل.س</span>`;

        let total = 0;
        document.querySelectorAll(".mobile-container .total span").forEach(currentTotal => {
          total += +currentTotal.textContent.replace(" ل.س", "");
        })
        placeOrderContainer.querySelector(".total").textContent = total;
      }
    } else if(e.target.classList.contains("removeAllBtnmobile")) {
      // empty cart local storage and empty cart page
      let newCart = {};
      localStorage.setItem("cart", JSON.stringify(newCart));
      document.querySelectorAll(".cart").forEach((el) => {
        el.textContent = "0";
      });
      document.querySelector(".products").innerHTML = `<h1 class="text-4xl text-yellow-600 text-center pb-4 lg:pb-8 shadow-sm">سلة المشتريات فارغة</h1>`;
      Toastify({
        text: "تم إفراغ سلة المشتريات بنجاح",
        duration: 3000,
        close: true,
        gravity: "bottom",
        position: "left",
        style: {
          background: "rgb(202 138 4)",
          color: "white",
        },
        offset: {
          x: 10,
        },
      }).showToast();
    }
  })

  document.querySelector(".mobile-container")?.addEventListener("input", function (e) {
    if (e.target.id == "qty") {
      if (e.target.value.length > 2) {
        e.target.value = e.target.value.slice(0, 2);
        let meal_id = e.target.parentNode.id;
        let newCart = JSON.parse(localStorage.getItem("cart"));
        newCart[meal_id] = e.target.value.slice(0, 2);
        localStorage.setItem("cart", JSON.stringify(newCart));
        if (newCart == null || Object.keys(newCart).length == 0) {
          document.querySelectorAll(".cart").forEach((el) => {
            el.textContent = "0";
          });
        } else {
          document.querySelectorAll(".cart").forEach((el) => {
            el.textContent = Object.values(newCart).reduce(
              (accumulator, currentValue) =>
                accumulator + currentValue
            );
          });
        }
      }

      if (e.target.value == "" || e.target.value == 0) {
        e.target.value = 1;
        let meal_id = e.target.parentNode.id;
        let newCart = JSON.parse(localStorage.getItem("cart"));
        newCart[meal_id] = 1;
        localStorage.setItem("cart", JSON.stringify(newCart));
        if (newCart == null || Object.keys(newCart).length == 0) {
          document.querySelectorAll(".cart").forEach((el) => {
            el.textContent = "0";
          });
        } else {
          document.querySelectorAll(".cart").forEach((el) => {
            el.textContent = Object.values(newCart).reduce(
              (accumulator, currentValue) =>
                accumulator + currentValue
            );
          });
        }
      }

      if (e.target.value > 20) {
        e.target.value = 20;
        let meal_id = e.target.parentNode.id;
        let newCart = JSON.parse(localStorage.getItem("cart"));
        newCart[meal_id] = 20;
        localStorage.setItem("cart", JSON.stringify(newCart));
        if (newCart == null || Object.keys(newCart).length == 0) {
          document.querySelectorAll(".cart").forEach((el) => {
            el.textContent = "0";
          });
        } else {
          document.querySelectorAll(".cart").forEach((el) => {
            el.textContent = Object.values(newCart).reduce(
              (accumulator, currentValue) =>
                accumulator + currentValue
            );
          });
        }
      }

      if (e.target.value <= 20 && e.target.value >= 1) {
        let meal_id = e.target.parentNode.id;
        let newCart = JSON.parse(localStorage.getItem("cart"));
        newCart[meal_id] = +e.target.value;
        localStorage.setItem("cart", JSON.stringify(newCart));
        if (newCart == null || Object.keys(newCart).length == 0) {
          document.querySelectorAll(".cart").forEach((el) => {
            el.textContent = "0";
          });
        } else {
          document.querySelectorAll(".cart").forEach((el) => {
            el.textContent = Object.values(newCart).reduce(
              (accumulator, currentValue) =>
                accumulator + currentValue
            );
          });
        }
        let currentTotal = e.target.parentNode.parentNode.parentNode.parentNode.querySelector(".total");
        let quantity = e.target.parentNode.querySelector("#qty");
        let singularPrice = e.target.parentNode.parentNode.parentNode.parentNode.querySelector(".singularPrice");

        currentTotal.innerHTML = `الإجمالي: <span class="text-black">${+quantity.value * +singularPrice.textContent.replace(" ل.س", "").replace("السعر: ", "")} ل.س</span>`;

        let total = 0;
        document.querySelectorAll(".mobile-container .total span").forEach(currentTotal => {
          total += +currentTotal.textContent.replace(" ل.س", "");
        })
        placeOrderContainer.querySelector(".total").textContent = total;
      }
    }
  });

  if(!placeOrderContainer.firstElementChild.classList.contains("not-registered")) {
    let placeOrderBtn = placeOrderContainer.querySelector("#place-order");
    axios.get("/get-addresses")
    .then(function(response) {
      if(response.data.data.length == 0) {
        placeOrderContainer.querySelector(".select-field").innerHTML = `<p>لا يوجد عناوين، <a href="/addresses" class="text-yellow-600">قم بإضافة عنوان</a></p>`;
        placeOrderBtn.disabled = true;
        if(!placeOrderBtn.classList.contains("opacity-30")) {
          placeOrderBtn.classList.add("opacity-30");
        }
        if(placeOrderBtn.classList.contains("hover:bg-white")) {
          placeOrderBtn.classList.remove("hover:bg-white");
        }
        if(placeOrderBtn.classList.contains("hover:text-yellow-600")) {
          placeOrderBtn.classList.remove("hover:text-yellow-600");
        }
      } else {
        let selectBox = placeOrderContainer.querySelector("#address");
        let notesField = placeOrderContainer.querySelector("#notes");
        response.data.data.forEach(address => {
          selectBox.insertAdjacentHTML("beforeend", `
          <option value="${address.id}">${address.title} - ${address.region} - ${address.street} - الطابق ${address.floor_number}</option>
          `);
        })
        placeOrderBtn.disabled = false;
        if(placeOrderBtn.classList.contains("opacity-30")) {
          placeOrderBtn.classList.remove("opacity-30");
        }
        if(!placeOrderBtn.classList.contains("hover:bg-white")) {
          placeOrderBtn.classList.add("hover:bg-white");
        }
        if(!placeOrderBtn.classList.contains("hover:text-yellow-600")) {
          placeOrderBtn.classList.add("hover:text-yellow-600");
        }

        placeOrderBtn.addEventListener('click', function(e) {
          document.querySelector("body").insertAdjacentHTML("beforeend", `
          <div id="loader" class="fixed top-0 left-0 bg-black opacity-60 w-full h-full flex justify-center items-center">
          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; background: none; display: block; shape-rendering: auto;" width="200px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
            <circle cx="50" cy="50" fill="none" stroke="#ffffff" stroke-width="10" r="35" stroke-dasharray="164.93361431346415 56.97787143782138">
              <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s" values="0 50 50;360 50 50" keyTimes="0;1"></animateTransform>
            </circle>
          </svg>
          </div>
          `);
          axios.post('/place-order', {
            cart: localStorage.getItem("cart"),
            address_id: selectBox.value,
            notes: notesField.value.length > 0 ? notesField.value : "لا توجد ملاحظات"
          })
          .then(function(response) {
            document.querySelector('#loader').remove();
            if(response.status == 201) {
              Toastify({
                text: response.data.message,
                duration: 2000,
                close: true,
                gravity: "bottom",
                position: "left",
                style: {
                  background: "rgb(202 138 4)",
                  color: "white",
                },
                offset: {
                  x: 10,
                },
              }).showToast();
            } else if(response.status == 200) {
              // empty cart local storage and empty cart page and update balance
              let newCart = {};
              localStorage.setItem("cart", JSON.stringify(newCart));
              document.querySelectorAll(".cart").forEach((el) => {
                el.textContent = "0";
              });
              document.querySelectorAll(".balance").forEach(el => {
                el.querySelector("p").textContent = response.data;
              })
              document.querySelector(".products").innerHTML = `<h1 class="text-4xl text-yellow-600 text-center pb-4 lg:pb-8 shadow-sm">سلة المشتريات فارغة</h1>`;
              Toastify({
                text: "تمت إضافة الطلب بنجاح، يمكنك تتبع حالة الطلب من خلال الدخول إلى صفحة طلباتي",
                duration: 5000,
                close: true,
                gravity: "bottom",
                position: "left",
                style: {
                  background: "rgb(202 138 4)",
                  color: "white",
                },
                offset: {
                  x: 10,
                },
              }).showToast();
            }
          })
          .catch(function(error) {
            document.querySelector('#loader')?.remove();
            console.log(error)
            Toastify({
              text: "حصل خطأ ما، يرجى المحاولة لاحقاً",
              duration: 2000,
              close: true,
              gravity: "bottom",
              position: "left",
              style: {
                background: "rgb(202 138 4)",
                color: "white",
              },
              offset: {
                x: 10,
              },
            }).showToast();
          })
        })
      }
    })
    .catch(function(error) {
      console.log(error)
      Toastify({
        text: "حصل خطأ ما، يرجى المحاولة لاحقاً",
        duration: 2000,
        close: true,
        gravity: "bottom",
        position: "left",
        style: {
          background: "rgb(202 138 4)",
          color: "white",
        },
        offset: {
          x: 10,
        },
      }).showToast();
    })
  }
}

let svg = document.querySelector(".dropdown")?.querySelector("svg");
let dropdownMenu = document.querySelector(".dropdown-menu");
document.querySelector(".dropdown")?.addEventListener('click', function(e) {
  svg.classList.toggle("rotate-180");
  // dropdownMenu.classList.toggle("hidden");
  dropdownMenu.classList.toggle("scale-0");
  dropdownMenu.classList.toggle("scale-100");
})


let observer = new IntersectionObserver(function(entries, options) {
  entries.forEach(entry => {
    if(entry.intersectionRatio < 1) {
      if(dropdownMenu.classList.contains("scale-100")) {
        svg.classList.toggle("rotate-180");
        // dropdownMenu.classList.toggle("hidden");
        dropdownMenu.classList.toggle("scale-0");
        dropdownMenu.classList.toggle("scale-100");
      }
    }
  })
}, {
  root: null,
  rootMargin: "0px",
  threshold: 1,
});

if(dropdownMenu) {
  observer.observe(dropdownMenu);
}

if (document.URL.includes("/addresses")) {
  document.querySelector(".address-container").addEventListener('click', function(e) {
    e.preventDefault();
    if(e.target.classList.contains("removeAddressBtn")) {
      let address = e.target.parentNode.parentNode;
      let removeBtn = e.target;
      removeBtn.innerHTML =
      `
      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; background: none; display: block; shape-rendering: auto;" width="24px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
        <circle cx="50" cy="50" fill="none" stroke="#ffffff" stroke-width="10" r="35" stroke-dasharray="164.93361431346415 56.97787143782138">
          <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s" values="0 50 50;360 50 50" keyTimes="0;1"></animateTransform>
        </circle>
      </svg>
      `

      removeBtn.classList.toggle("hover:bg-white");
      removeBtn.classList.toggle("hover:text-yellow-600");
      removeBtn.classList.toggle("hover:scale-110");
      removeBtn.disabled = true;

      axios.post('/remove-address', {
        id: address.id,
      })
      .then(function (response) {
        if(response.status == 200) {
          address.remove();
          if(!document.querySelector(".address-container > .address")) {
            document.querySelector(".address-container").insertAdjacentHTML("beforeend",
            `<h1 class="text-center text-2xl text-yellow-600">لا يوجد عناوين</h1>`
            );
          }
          Toastify({
            text: "تم حذف العنوان بنجاح",
            duration: 2000,
            close: true,
            gravity: "bottom",
            position: "right",
            style: {
              background: "rgb(202 138 4)",
              color: "white",
            },
            offset: {
              x: 10,
            },
          }).showToast();
        } else {
          removeBtn.textContent = "حذف";
          removeBtn.classList.toggle("hover:bg-white");
          removeBtn.classList.toggle("hover:text-yellow-600");
          removeBtn.classList.toggle("hover:scale-110");
          removeBtn.disabled = false;
          Toastify({
            text: "يتعذر حذف العنوان الرجاء المحاولة مجدداً",
            duration: 2000,
            close: true,
            gravity: "bottom",
            position: "right",
            style: {
              background: "rgb(202 138 4)",
              color: "white",
            },
            offset: {
              x: 10,
            },
          }).showToast();
        }
      })
      .catch(function (error) {
        console.log(error);
        removeBtn.textContent = "حذف";
        removeBtn.classList.toggle("hover:bg-white");
        removeBtn.classList.toggle("hover:text-yellow-600");
        removeBtn.classList.toggle("hover:scale-110");
        removeBtn.disabled = false;
        Toastify({
          text: "حصل خطأ ما، يرجى المحاولة لاحقاً",
          duration: 2000,
          close: true,
          gravity: "bottom",
          position: "left",
          style: {
            background: "rgb(202 138 4)",
            color: "white",
          },
          offset: {
            x: 10,
          },
        }).showToast();
      });
    } else if(e.target.classList.contains("editAddressBtn")) {
      let editAddressBtn = e.target;
      let titleField = editAddressBtn.parentNode.parentNode.querySelector(".titleValue");
      let regionField = editAddressBtn.parentNode.parentNode.querySelector(".regionValue");
      let streetField = editAddressBtn.parentNode.parentNode.querySelector(".streetValue");
      let floorNoField = editAddressBtn.parentNode.parentNode.querySelector(".floorNoValue");
      let detailsField = editAddressBtn.parentNode.parentNode.querySelector(".detailsValue");

      titleField.innerHTML = `<input class="mt-1" type="text" value="${titleField.textContent}"></input>`;
      regionField.innerHTML = `<input class="mt-1" type="text" value="${regionField.textContent}"></input>`;
      streetField.innerHTML = `<input class="mt-1" type="text" value="${streetField.textContent}"></input>`;
      floorNoField.innerHTML = `<input class="mt-1" type="text" value="${floorNoField.textContent}"></input>`;
      detailsField.innerHTML = `<input class="mt-1" type="text" value="${detailsField.textContent}"></input>`;

      editAddressBtn.textContent = `حفظ`;
      editAddressBtn.classList.add("editing");
      editAddressBtn.classList.toggle("editAddressBtn");
    } else if(e.target.classList.contains("editing")) {
      let editAddressBtn = e.target;
      let address = e.target.parentNode.parentNode;

      let title = address.querySelector(".titleValue input");
      let region = address.querySelector(".regionValue input");
      let street = address.querySelector(".streetValue input");
      let floorNo = address.querySelector(".floorNoValue input");
      let details = address.querySelector(".detailsValue input");

      let error = false;

      if(title.value == "" || title.value.length > 255) {
        Toastify({
          text: "حقل اسم العنوان يحوي بيانات خاطئة، يجب ألا يكون فارغاً وألا يكون أكبر من 255 محرف",
          duration: 2000,
          close: true,
          gravity: "bottom",
          position: "left",
          style: {
            background: "rgb(202 138 4)",
            color: "white",
          },
          offset: {
            x: 10,
          },
        }).showToast();
        error = true;
        return;
      }

      if(region.value == "" || region.value.length > 255) {
        Toastify({
          text: "حقل المنطقة يحوي بيانات خاطئة، يجب ألا يكون فارغاً وألا يكون أكبر من 255 محرف",
          duration: 2000,
          close: true,
          gravity: "bottom",
          position: "left",
          style: {
            background: "rgb(202 138 4)",
            color: "white",
          },
          offset: {
            x: 10,
          },
        }).showToast();
        error = true;
        return;
      }

      if(street.value == "" || street.value.length > 255) {
        Toastify({
          text: "حقل الشارع يحوي بيانات خاطئة، يجب ألا يكون فارغاً وألا يكون أكبر من 255 محرف",
          duration: 2000,
          close: true,
          gravity: "bottom",
          position: "left",
          style: {
            background: "rgb(202 138 4)",
            color: "white",
          },
          offset: {
            x: 10,
          },
        }).showToast();
        error = true;
        return;
      }

      if(floorNo.value == "" || floorNo.value > 10 || floorNo.value < 0) {
        Toastify({
          text: "حقل الطابق يحوي بيانات خاطئة، يجب ألا يكون فارغاً وألا يكون أكبر من 10 أو أصغر من 0",
          duration: 2000,
          close: true,
          gravity: "bottom",
          position: "left",
          style: {
            background: "rgb(202 138 4)",
            color: "white",
          },
          offset: {
            x: 10,
          },
        }).showToast();
        error = true;
        return;
      }

      if(details.value == "" || details.value.length > 255) {
        Toastify({
          text: "حقل التفاصيل يحوي بيانات خاطئة، يجب ألا يكون فارغاً وألا يكون أكبر من 255 محرف",
          duration: 2000,
          close: true,
          gravity: "bottom",
          position: "left",
          style: {
            background: "rgb(202 138 4)",
            color: "white",
          },
          offset: {
            x: 10,
          },
        }).showToast();
        error = true;
        return;
      }

      if(!error) {
        editAddressBtn.innerHTML = `
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; background: none; display: block; shape-rendering: auto;" width="24px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
          <circle cx="50" cy="50" fill="none" stroke="#ffffff" stroke-width="10" r="35" stroke-dasharray="164.93361431346415 56.97787143782138">
            <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s" values="0 50 50;360 50 50" keyTimes="0;1"></animateTransform>
          </circle>
        </svg>`;

      editAddressBtn.classList.toggle("hover:bg-white");
      editAddressBtn.classList.toggle("hover:text-yellow-600");
      editAddressBtn.classList.toggle("hover:scale-110");
      editAddressBtn.disabled = true;

      axios.post('/edit-address', {
        id: address.id,
        title: title.value,
        region: region.value,
        street: street.value,
        floorNo: floorNo.value,
        details: details.value
      })
      .then(function (response) {
        if(response.status == 200) {
          let title = address.querySelector(".titleValue");
          let region = address.querySelector(".regionValue");
          let street = address.querySelector(".streetValue");
          let floorNo = address.querySelector(".floorNoValue");
          let details = address.querySelector(".detailsValue");

          title.innerHTML = `${response.data.data.title}`;
          region.innerHTML = `${response.data.data.region}`;
          street.innerHTML = `${response.data.data.street}`;
          floorNo.innerHTML = `${response.data.data.floor_number}`;
          details.innerHTML = `${response.data.data.details}`;

          editAddressBtn.classList.toggle("hover:bg-white");
          editAddressBtn.classList.toggle("hover:text-yellow-600");
          editAddressBtn.classList.toggle("hover:scale-110");
          editAddressBtn.classList.remove("editing");
          editAddressBtn.classList.toggle("editAddressBtn");
          editAddressBtn.disabled = false;
          editAddressBtn.textContent = `تعديل`;

          Toastify({
            text: "تم تعديل العنوان بنجاح",
            duration: 2000,
            close: true,
            gravity: "bottom",
            position: "right",
            style: {
              background: "rgb(202 138 4)",
              color: "white",
            },
            offset: {
              x: 10,
            },
          }).showToast();
        } else {

          editAddressBtn.classList.toggle("hover:bg-white");
          editAddressBtn.classList.toggle("hover:text-yellow-600");
          editAddressBtn.classList.toggle("hover:scale-110");
          editAddressBtn.disabled = false;
          editAddressBtn.textContent = `حفظ`;

          Toastify({
            text: "يتعذر تعديل العنوان، يوجد خطأ في البيانات المدخلة",
            duration: 2000,
            close: true,
            gravity: "bottom",
            position: "right",
            style: {
              background: "rgb(202 138 4)",
              color: "white",
            },
            offset: {
              x: 10,
            },
          }).showToast();
        }
      })
      .catch(function (error) {
        console.log(error);

        editAddressBtn.classList.toggle("hover:bg-white");
        editAddressBtn.classList.toggle("hover:text-yellow-600");
        editAddressBtn.classList.toggle("hover:scale-110");
        editAddressBtn.disabled = false;
        editAddressBtn.textContent = `حفظ`;

        Toastify({
          text: "حصل خطأ ما، يرجى المحاولة لاحقاً",
          duration: 2000,
          close: true,
          gravity: "bottom",
          position: "left",
          style: {
            background: "rgb(202 138 4)",
            color: "white",
          },
          offset: {
            x: 10,
          },
        }).showToast();
      });

      }

    }
  })

  document.querySelector(".saveAddressBtn").addEventListener('click', function(e) {
    let title = this.parentNode.querySelector("#title");
    let region = this.parentNode.querySelector("#region");
    let street = this.parentNode.querySelector("#street");
    let floorNo = this.parentNode.querySelector("#floorNo");
    let details = this.parentNode.querySelector("#details");
    let error = false;

    if(title.value == "" || title.value.length > 255) {
      Toastify({
        text: "حقل اسم العنوان يحوي بيانات خاطئة، يجب ألا يكون فارغاً وألا يكون أكبر من 255 محرف",
        duration: 2000,
        close: true,
        gravity: "bottom",
        position: "left",
        style: {
          background: "rgb(202 138 4)",
          color: "white",
        },
        offset: {
          x: 10,
        },
      }).showToast();
      error = true;
      return;
    }

    if(region.value == "" || region.value.length > 255) {
      Toastify({
        text: "حقل المنطقة يحوي بيانات خاطئة، يجب ألا يكون فارغاً وألا يكون أكبر من 255 محرف",
        duration: 2000,
        close: true,
        gravity: "bottom",
        position: "left",
        style: {
          background: "rgb(202 138 4)",
          color: "white",
        },
        offset: {
          x: 10,
        },
      }).showToast();
      error = true;
      return;
    }

    if(street.value == "" || street.value.length > 255) {
      Toastify({
        text: "حقل الشارع يحوي بيانات خاطئة، يجب ألا يكون فارغاً وألا يكون أكبر من 255 محرف",
        duration: 2000,
        close: true,
        gravity: "bottom",
        position: "left",
        style: {
          background: "rgb(202 138 4)",
          color: "white",
        },
        offset: {
          x: 10,
        },
      }).showToast();
      error = true;
      return;
    }

    if(floorNo.value == "" || floorNo.value > 10 || floorNo.value < 0) {
      Toastify({
        text: "حقل الطابق يحوي بيانات خاطئة، يجب ألا يكون فارغاً وألا يكون أكبر من 10 أو أصغر من 0",
        duration: 2000,
        close: true,
        gravity: "bottom",
        position: "left",
        style: {
          background: "rgb(202 138 4)",
          color: "white",
        },
        offset: {
          x: 10,
        },
      }).showToast();
      error = true;
      return;
    }

    if(details.value == "" || details.value.length > 255) {
      Toastify({
        text: "حقل التفاصيل يحوي بيانات خاطئة، يجب ألا يكون فارغاً وألا يكون أكبر من 255 محرف",
        duration: 2000,
        close: true,
        gravity: "bottom",
        position: "left",
        style: {
          background: "rgb(202 138 4)",
          color: "white",
        },
        offset: {
          x: 10,
        },
      }).showToast();
      error = true;
      return;
    }

    if(!error) {

      this.innerHTML = `
      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; background: none; display: block; shape-rendering: auto;" width="24px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
        <circle cx="50" cy="50" fill="none" stroke="#ffffff" stroke-width="10" r="35" stroke-dasharray="164.93361431346415 56.97787143782138">
          <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s" values="0 50 50;360 50 50" keyTimes="0;1"></animateTransform>
        </circle>
      </svg>`;

      this.classList.toggle("hover:bg-white");
      this.classList.toggle("hover:text-yellow-600");
      this.classList.toggle("hover:scale-105");
      this.disabled = true;

      // because you can't use "this" inside the promise resolve callback (.then)
      let saveBtn = this;

      axios.post('/save-address', {
        title: title.value,
        region: region.value,
        street: street.value,
        floorNo: floorNo.value,
        details: details.value
      })
      .then(function (response) {
        if(response.status == 201) {
          if(document.querySelector(".address-container > h1")) {
            document.querySelector(".address-container > h1").remove()
          }
          document.querySelector(".address-container").insertAdjacentHTML("beforeend", `
          <div id="${response.data.data.id}" class="w-full p-2 flex flex-col lg:flex-row items-center justify-center lg:justify-between gap-2 lg:gap-0">
            <div class="flex-1 w-full lg:w-fit">
              <p><span class="font-bold title">اسم العنوان:</span> <span class="titleValue">${response.data.data.title}</span></p>
              <p><span class="font-bold region">المنطقة:</span> <span class="regionValue">${response.data.data.region}</span></p>
            </div>
            <div class="flex-1 w-full lg:w-fit">
            <p><span class="font-bold street">الشارع:</span> <span class="streetValue">${response.data.data.street}</span></p>
            <p><span class="font-bold floorNo">الطابق:</span> <span class="floorNoValue">${response.data.data.floor_number}</span></p>
            <p><span class="font-bold details">تفاصيل:</span> <span class="detailsValue">${response.data.data.details}</span></p>
            </div>
            <div class="flex flex-col items-center justify-center space-y-2 w-full lg:w-fit">
              <button class="cursor-pointer w-full text-center transition-all py-2 px-4 border-2 border-yellow-600 bg-yellow-600 text-white hover:bg-white hover:text-yellow-600 hover:scale-110 rounded-md removeAddressBtn">حذف</button>
              <button class="cursor-pointer w-full text-center transition-all py-2 px-4 border-2 border-yellow-600 bg-yellow-600 text-white hover:bg-white hover:text-yellow-600 hover:scale-110 rounded-md editAddressBtn">تعديل</button>
            </div>
          </div>`);

          saveBtn.textContent = `حفظ`;
          saveBtn.classList.toggle("hover:bg-white");
          saveBtn.classList.toggle("hover:text-yellow-600");
          saveBtn.classList.toggle("hover:scale-105");
          saveBtn.disabled = false;

          title.value = "";
          region.value = "";
          street.value = "";
          floorNo.value = "";
          details.value = "";

          Toastify({
            text: "تمت إضافة العنوان بنجاح",
            duration: 2000,
            close: true,
            gravity: "bottom",
            position: "right",
            style: {
              background: "rgb(202 138 4)",
              color: "white",
            },
            offset: {
              x: 10,
            },
          }).showToast();
        } else {

          saveBtn.textContent = `حفظ`;
          saveBtn.classList.toggle("hover:bg-white");
          saveBtn.classList.toggle("hover:text-yellow-600");
          saveBtn.classList.toggle("hover:scale-105");
          saveBtn.disabled = false;

          Toastify({
            text: "يتعذر إضافة عنوان، يوجد خطأ في البيانات المدخلة",
            duration: 2000,
            close: true,
            gravity: "bottom",
            position: "right",
            style: {
              background: "rgb(202 138 4)",
              color: "white",
            },
            offset: {
              x: 10,
            },
          }).showToast();
        }
      })
      .catch(function (error) {
        console.log(error);

        saveBtn.textContent = `حفظ`;
        saveBtn.classList.toggle("hover:bg-white");
        saveBtn.classList.toggle("hover:text-yellow-600");
        saveBtn.classList.toggle("hover:scale-105");
        saveBtn.disabled = false;

        Toastify({
          text: "حصل خطأ ما، يرجى المحاولة لاحقاً",
          duration: 2000,
          close: true,
          gravity: "bottom",
          position: "left",
          style: {
            background: "rgb(202 138 4)",
            color: "white",
          },
          offset: {
            x: 10,
          },
        }).showToast();
      });
    }
  })
}

if (document.URL.includes("/orders")) {
  document.querySelectorAll(".order-container").forEach(el => {
    el.addEventListener("click", function(e) {
      if(e.target.classList.contains("cancelOrderBtn")) {
        let Btn = el.querySelector(".cancelOrderBtn");
        let total = +el.querySelector(".total").textContent;

        Btn.innerHTML = `
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; background: none; display: block; shape-rendering: auto;" width="24px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
          <circle cx="50" cy="50" fill="none" stroke="#ffffff" stroke-width="10" r="35" stroke-dasharray="164.93361431346415 56.97787143782138">
            <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s" values="0 50 50;360 50 50" keyTimes="0;1"></animateTransform>
          </circle>
        </svg>`;
        Btn.disabled = true;
        Btn.classList.remove("hover:bg-white");
        Btn.classList.remove("hover:text-yellow-600");
        Btn.classList.remove("hover:scale-110");

        axios.post("/cancel-order", {
          order_id: el.id
        })
        .then(function(response) {
          if(response.status == 200) {
            el.querySelector(".status").innerHTML = "ملغي";
            Btn.innerHTML = "إلغاء الطلب";
            Btn.disabled = true;
            Btn.classList.remove("hover:bg-white");
            Btn.classList.remove("hover:text-yellow-600");
            Btn.classList.remove("hover:scale-110");
            Btn.classList.remove("cancelOrderBtn");
            Btn.classList.add("opacity-30");

            let balanceContainer = document.querySelector(".balance > p");
            let balance = +balanceContainer.textContent.replace("الرصيد: ", "");
            balance += total;
            document.querySelectorAll(".balance > p").forEach(el => {
              el.textContent = `الرصيد: ${balance}`;
            })

            Toastify({
              text: "تم إلغاء الطلب بنجاح",
              duration: 2000,
              close: true,
              gravity: "bottom",
              position: "left",
              style: {
                background: "rgb(202 138 4)",
                color: "white",
              },
              offset: {
                x: 10,
              },
            }).showToast();
          } else if(response.status == 201) {
            Btn.innerHTML = "إلغاء الطلب";
            Btn.disabled = false;
            Btn.classList.add("hover:bg-white");
            Btn.classList.add("hover:text-yellow-600");
            Btn.classList.add("hover:scale-110");
            Toastify({
              text: response.data.message,
              duration: 3000,
              close: true,
              gravity: "bottom",
              position: "left",
              style: {
                background: "rgb(202 138 4)",
                color: "white",
              },
              offset: {
                x: 10,
              },
            }).showToast();
          }
        })
        .catch(function(error) {
          console.log(error);
          Btn.innerHTML = "إلغاء الطلب";
          Btn.disabled = false;
          Btn.classList.add("hover:bg-white");
          Btn.classList.add("hover:text-yellow-600");
          Btn.classList.add("hover:scale-110");
          Toastify({
            text: "حصل خطأ ما، يرجى المحاولة لاحقاً",
            duration: 2000,
            close: true,
            gravity: "bottom",
            position: "left",
            style: {
              background: "rgb(202 138 4)",
              color: "white",
            },
            offset: {
              x: 10,
            },
          }).showToast();
        })
      }
    })
  })
}

if (document.URL.includes("/kitchen")) {
  let nextOrderBtn = document.querySelector(".nextOrderBtn");
  if(nextOrderBtn != null) {
    let orderContainer = nextOrderBtn.closest(".order-container");
    let orderId = orderContainer.querySelector(".order-id");
    let orderStatus = orderContainer.querySelector(".status");
    let orderedAt = orderContainer.querySelector(".ordered-at");
    let orderedNotes = orderContainer.querySelector(".order-notes");
    let mealContainer = orderContainer.querySelector(".meal-container");

    nextOrderBtn.addEventListener("click", function() {
      nextOrderBtn.innerHTML = `
      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; background: none; display: block; shape-rendering: auto;" width="24px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
        <circle cx="50" cy="50" fill="none" stroke="#ffffff" stroke-width="10" r="35" stroke-dasharray="164.93361431346415 56.97787143782138">
          <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s" values="0 50 50;360 50 50" keyTimes="0;1"></animateTransform>
        </circle>
      </svg>`;
      nextOrderBtn.classList.toggle("hover:bg-white");
      nextOrderBtn.classList.toggle("hover:text-yellow-600");
      nextOrderBtn.disabled = true;
      axios.post("/order-completed", {
        id: orderContainer.id
      })
      .then(function(response) {
        nextOrderBtn.innerHTML = `تم التجهيز`;
        nextOrderBtn.classList.toggle("hover:bg-white");
        nextOrderBtn.classList.toggle("hover:text-yellow-600");
        nextOrderBtn.disabled = false;

        if(response.status == 200) {
          orderContainer.id = response.data.order.id;
          orderId.textContent = response.data.order.id;
          orderStatus.textContent = response.data.order.status;
          orderedAt.textContent = response.data.order.ordered_at;
          orderedNotes.textContent = response.data.order.notes;
          mealContainer.innerHTML = "";

          response.data.order.meals.forEach(meal => {
            mealContainer.insertAdjacentHTML("beforeend", `
            <div class="flex items-center justify-between">
              <p class="lg:flex-1">${meal.title} × ${meal.pivot.quantity}</p>
              <div class="lg:flex-1">
                  <input type="checkbox" name="done" class="text-yellow-600 focus:ring-yellow-600">
              </div>
            </div>
            `)
          })
        } else if(response.status == 201) {
          document.querySelector(".main-container").innerHTML = `<h1 class="text-center text-yellow-600 text-2xl">لا يوجد طلبات</h1>`;
          Toastify({
            text: response.data.message,
            duration: 2000,
            close: true,
            gravity: "bottom",
            position: "left",
            style: {
              background: "rgb(202 138 4)",
              color: "white",
            },
            offset: {
              x: 10,
            },
          }).showToast();
        }

      })
      .catch(function(error) {
        console.log(error);
        nextOrderBtn.innerHTML = `تم التجهيز`;
        nextOrderBtn.classList.toggle("hover:bg-white");
        nextOrderBtn.classList.toggle("hover:text-yellow-600");
        nextOrderBtn.disabled = false;
        Toastify({
          text: "حصل خطأ ما، يرجى المحاولة لاحقاً",
          duration: 2000,
          close: true,
          gravity: "bottom",
          position: "left",
          style: {
            background: "rgb(202 138 4)",
            color: "white",
          },
          offset: {
            x: 10,
          },
        }).showToast();
      })
    })
  }
}

if(document.URL.includes("/points")) {
  document.querySelectorAll(".replacePointsBtn").forEach(el => {
    el.addEventListener("click", function(e) {
      el.innerHTML = `
      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; background: none; display: block; shape-rendering: auto;" width="24px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
        <circle cx="50" cy="50" fill="none" stroke="#ffffff" stroke-width="10" r="35" stroke-dasharray="164.93361431346415 56.97787143782138">
          <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s" values="0 50 50;360 50 50" keyTimes="0;1"></animateTransform>
        </circle>
      </svg>`;
      el.classList.toggle("hover:bg-white");
      el.classList.toggle("hover:text-yellow-600");
      el.classList.toggle("hover:scale-105");
      el.disabled = true;
      axios.post("/replace-points", {
        id: el.closest(".pointDeal").id
      })
      .then(function(response) {
        el.innerHTML = `استبدال`
        el.classList.toggle("hover:bg-white");
        el.classList.toggle("hover:text-yellow-600");
        el.classList.toggle("hover:scale-105");
        el.disabled = false;
        if(response.status == 200) {
          document.querySelectorAll(".balance > p").forEach(el => {
            el.textContent = `الرصيد: ${response.data.balance}`
          })
          document.querySelector(".my-points").textContent = `نقاطي: ${response.data.points}`
          Toastify({
            text: "تم استبدال النقاط بنجاح",
            duration: 2000,
            close: true,
            gravity: "bottom",
            position: "left",
            style: {
              background: "rgb(202 138 4)",
              color: "white",
            },
            offset: {
              x: 10,
            },
          }).showToast();
        } else if(response.status == 201) {
          Toastify({
            text: response.data.message,
            duration: 2000,
            close: true,
            gravity: "bottom",
            position: "left",
            style: {
              background: "rgb(202 138 4)",
              color: "white",
            },
            offset: {
              x: 10,
            },
          }).showToast();
        }
      })
      .catch(function(error) {
        console.log(error)
        el.innerHTML = `استبدال`
        el.classList.toggle("hover:bg-white");
        el.classList.toggle("hover:text-yellow-600");
        el.classList.toggle("hover:scale-105");
        el.disabled = false;
        Toastify({
          text: "حصل خطأ ما، يرجى المحاولة لاحقاً",
          duration: 2000,
          close: true,
          gravity: "bottom",
          position: "left",
          style: {
            background: "rgb(202 138 4)",
            color: "white",
          },
          offset: {
            x: 10,
          },
        }).showToast();
      })
    })
  })
}

// Fix bug when returning back from addresses to cart the addresses don't get updated
window.addEventListener("pageshow", function (event) {
  var historyTraversal = event.persisted || typeof window.performance != "undefined" && window.performance.navigation.type === 2;
  if (historyTraversal) {
    // Handle page restore.
    window.location.reload();
  }
});
