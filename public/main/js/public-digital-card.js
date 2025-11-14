document.addEventListener("DOMContentLoaded", async () => {
  let cardData = {};
  const publicApi = document
    .querySelector('meta[name="public-card-url"]')
    .getAttribute("content");
  const csrfToken = document
    .querySelector('meta[name="csrf-token"]')
    .getAttribute("content");
  const storagePath = document
    .querySelector('meta[name="storage-path"]')
    .getAttribute("content");
  const defaultAvatar = document
    .querySelector('meta[name="default-avatar"]')
    .getAttribute("content");
  const splashScreen = document.getElementById("splashScreen");
  const loadingState = document.getElementById("loadingState");
  const cardContent = document.getElementById("cardContent");
  const errorState = document.getElementById("errorState");

  // Hide splash screen after minimum display time
  function hideSplash() {
    setTimeout(() => {
      splashScreen.classList.add("hide");
      setTimeout(() => {
        splashScreen.style.display = "none";
      }, 500);
    }, 1500); // Show splash for at least 1.5 seconds
  }

  // ================== Load Card Data ==================
  async function loadCardData() {
    try {
      const response = await fetch(publicApi, {
        headers: {
          "X-CSRF-TOKEN": csrfToken,
          Accept: "application/json",
        },
      });

      const result = await response.json();

      if (result.success && result.data) {
        cardData = {
          name: result.data.name || "",
          designation: result.data.designation || "",
          company: result.data.company || "",
          photo: result.data.photo
            ? storagePath + "/" + result.data.photo
            : defaultAvatar,
          social: {
            facebook: result.data.facebook || "",
            instagram: result.data.instagram || "",
            linkedin: result.data.linkedin || "",
            twitter: result.data.twitter || "",
            youtube: result.data.youtube || "",
            tiktok: result.data.tiktok || "",
            pinterest: result.data.pinterest || "",
            telegram: result.data.telegram || "",
            snapchat: result.data.snapchat || "",
            github: result.data.github || "",
          },
          contact: {
            website: result.data.website || "",
            mobile: result.data.mobile || "",
            email: result.data.email || "",
            whatsapp: result.data.whatsapp || "",
            address: result.data.address || "",
          },
        };
        return true;
      } else if (result.status === "inactive") {
        // Card is inactive - show message
        showError("This card is inactive. User registration required.");
        return false;
      } else {
        showError();
        return false;
      }
    } catch (error) {
      console.error("Error loading data:", error);
      showError();
      return false;
    }
  }

  // ================== Show Error State ==================
  function showError(message = null) {
    loadingState.classList.add("hidden");
    cardContent.classList.add("hidden");
    errorState.classList.remove("hidden");

    if (message) {
      errorState.querySelector("p").textContent = message;
    }
  }

  // ================== Show Card Content ==================
  function showCard() {
    loadingState.classList.add("hidden");
    errorState.classList.add("hidden");
    cardContent.classList.remove("hidden");
  }

  // ================== Initialize Card ==================
  async function initCard() {
    const success = await loadCardData();

    if (success) {
      document.getElementById("fullName").textContent =
        cardData.name || "Your Name";
      document.getElementById("designation").textContent =
        cardData.designation || "";
      document.getElementById("company").textContent = cardData.company
        ? "at " + cardData.company
        : "";
      document.getElementById("profilePhoto").src = cardData.photo;
      renderSocialLinks();
      renderContactInfo();
      showCard();
    }
  }

  // ================== Render Social Links ==================
  function renderSocialLinks() {
    const container = document.getElementById("socialLinks");
    container.innerHTML = "";
    const icons = {
      facebook: {
        i: "fab fa-facebook",
        c: "text-blue-600",
      },
      instagram: {
        i: "fab fa-instagram",
        c: "text-pink-600",
      },
      linkedin: {
        i: "fab fa-linkedin",
        c: "text-blue-700",
      },
      twitter: {
        i: "fab fa-twitter",
        c: "text-blue-400",
      },
      youtube: {
        i: "fab fa-youtube",
        c: "text-red-600",
      },
      tiktok: {
        i: "fab fa-tiktok",
        c: "text-black",
      },
      pinterest: {
        i: "fab fa-pinterest",
        c: "text-red-500",
      },
      telegram: {
        i: "fab fa-telegram",
        c: "text-blue-500",
      },
      snapchat: {
        i: "fab fa-snapchat",
        c: "text-yellow-400",
      },
      github: {
        i: "fab fa-github",
        c: "text-gray-800",
      },
    };
    Object.entries(cardData.social).forEach(([key, url]) => {
      if (url && url.trim() !== "") {
        const a = document.createElement("a");
        a.href = url;
        a.target = "_blank";
        a.className =
          "flex items-center justify-center w-12 h-12 transition transform bg-gray-100 rounded-xl hover:bg-gray-200 hover:scale-105";
        a.innerHTML = `<i class="${icons[key].i} ${icons[key].c} text-3xl"></i>`;
        container.appendChild(a);
      }
    });
  }

  // ================== Render Contact Info ==================
  function renderContactInfo() {
    const container = document.getElementById("contactInfo");
    container.innerHTML = "";

    const items = [
      {
        k: "mobile",
        i: "fa-regular fa-phone",
        l: cardData.contact.mobile,
        href: cardData.contact.mobile ? `tel:${cardData.contact.mobile}` : "",
      },
      {
        k: "whatsapp",
        i: "fab fa-whatsapp",
        l: "WhatsApp",
        c: "text-green-500",
        href: cardData.contact.whatsapp
          ? `https://wa.me/${cardData.contact.whatsapp.replace(/[^0-9]/g, "")}`
          : "",
      },
      {
        k: "email",
        i: "fa-regular fa-at",
        l: cardData.contact.email,
        href: cardData.contact.email ? `mailto:${cardData.contact.email}` : "",
      },
      {
        k: "website",
        i: "fa-regular fa-link",
        l: cardData.contact.website,
        href: cardData.contact.website
          ? `https://${cardData.contact.website}`
          : "",
      },
      {
        k: "address",
        i: "fa-regular fa-map-marker-alt",
        l: cardData.contact.address,
        href: "",
      },
    ];

    items.forEach((item, i) => {
      if (item.l && item.l.trim() !== "") {
        const div = document.createElement("div");
        div.className = `flex items-center justify-between py-4 ${
          i < items.length - 1 ? "border-b border-gray-200" : ""
        } hover:bg-gray-50 transition cursor-pointer rounded-lg px-3`;

        let innerWrapper;
        if (item.href) {
          innerWrapper = document.createElement("a");
          innerWrapper.href = item.href;
          innerWrapper.target = "_blank";
          innerWrapper.className = "flex items-center gap-4";
        } else {
          innerWrapper = document.createElement("div");
          innerWrapper.className = "flex items-center gap-4";
        }

        innerWrapper.innerHTML = `<div class="flex items-center justify-center w-10 h-10"><i class="${
          item.i
        } ${
          item.c || "text-gray-600"
        } text-xl"></i></div><span class="font-medium text-gray-900">${
          item.k === "whatsapp" ? item.l : item.l
        }</span>`;

        div.appendChild(innerWrapper);
        div.innerHTML += `<i class="text-gray-400 fas fa-chevron-right"></i>`;
        container.appendChild(div);
      }
    });
  }

  // ================== Save vCard (Full Version with Compressed Photo) ==================
  async function saveContact() {
    // ছবি compress করে base64-এ convert করা
    let photoData = "";
    try {
      const img = new Image();
      img.crossOrigin = "anonymous";

      await new Promise((resolve, reject) => {
        img.onload = () => {
          // Canvas তৈরি করা
          const canvas = document.createElement("canvas");
          const ctx = canvas.getContext("2d");

          // ছবির size কমানো (max 200x200 - vCard এর জন্য ideal)
          const maxSize = 200;
          let width = img.width;
          let height = img.height;

          // Aspect ratio maintain করে resize
          if (width > height) {
            if (width > maxSize) {
              height = (height * maxSize) / width;
              width = maxSize;
            }
          } else {
            if (height > maxSize) {
              width = (width * maxSize) / height;
              height = maxSize;
            }
          }

          canvas.width = width;
          canvas.height = height;

          // ছবি draw করা
          ctx.drawImage(img, 0, 0, width, height);

          // Compressed JPEG হিসেবে convert (quality 0.8 = 80%)
          const dataURL = canvas.toDataURL("image/jpeg", 0.8);
          const base64 = dataURL.split(",")[1];

          // vCard standard format (74 character per line)
          photoData = base64.match(/.{1,74}/g).join("\r\n ");

          resolve();
        };

        img.onerror = () => {
          console.error("Image load failed");
          reject();
        };

        // Image load করা
        if (cardData.photo.startsWith("data:")) {
          img.src = cardData.photo;
        } else {
          img.src = cardData.photo;
        }
      });
    } catch (error) {
      console.error("Error compressing photo for vCard:", error);
      photoData = "";
    }

    // vCard তৈরি করা - সঠিক ফরম্যাটে
    const vCardParts = [
      "BEGIN:VCARD",
      "VERSION:3.0",
      // নাম - N field প্রথমে (Last;First;Middle;Prefix;Suffix)
      `N;CHARSET=utf-8:${cardData.name};;;;`,
      // Full Name
      `FN;CHARSET=utf-8:${cardData.name}`,
      // Designation/Title
      cardData.designation ? `TITLE;CHARSET=utf-8:${cardData.designation}` : "",
      // Company/Organization
      cardData.company ? `ORG;CHARSET=utf-8:${cardData.company}` : "",
      // Email
      cardData.contact.email ? `EMAIL;INTERNET:${cardData.contact.email}` : "",
      // Mobile (PREF দিয়ে preferred number mark করা)
      cardData.contact.mobile ? `TEL;PREF:${cardData.contact.mobile}` : "",
      // Website
      cardData.contact.website
        ? `URL;TYPE=Home Page:${cardData.contact.website}`
        : "",
      // Address
      cardData.contact.address
        ? `ADR;TYPE=WORK;CHARSET=utf-8:;;${cardData.contact.address};;;;`
        : "",
      // Social Media URLs - সঠিক ফরম্যাটে
      cardData.social.facebook
        ? `URL;TYPE=Facebook:${cardData.social.facebook}`
        : "",
      cardData.contact.whatsapp
        ? `URL;TYPE=Whatsapp:https://wa.me/${cardData.contact.whatsapp.replace(
            /[^0-9]/g,
            ""
          )}`
        : "",
      cardData.social.instagram
        ? `URL;TYPE=Instagram:${cardData.social.instagram}`
        : "",
      cardData.social.tiktok ? `URL;TYPE=TikTok:${cardData.social.tiktok}` : "",
      cardData.social.linkedin
        ? `URL;TYPE=LinkedIn:${cardData.social.linkedin}`
        : "",
      cardData.social.twitter
        ? `URL;TYPE=Twitter:${cardData.social.twitter}`
        : "",
      cardData.social.youtube
        ? `URL;TYPE=YouTube:${cardData.social.youtube}`
        : "",
      cardData.social.pinterest
        ? `URL;TYPE=Pinterest:${cardData.social.pinterest}`
        : "",
      cardData.social.telegram
        ? `URL;TYPE=Telegram:${cardData.social.telegram}`
        : "",
      cardData.social.snapchat
        ? `URL;TYPE=Snapchat:${cardData.social.snapchat}`
        : "",
      cardData.social.github ? `URL;TYPE=GitHub:${cardData.social.github}` : "",
      // Photo - সঠিক ফরম্যাটে
      photoData ? `PHOTO;ENCODING=b;TYPE=image/jpeg:${photoData}` : "",
      "END:VCARD",
    ];

    // খালি লাইন বাদ দিয়ে vCard তৈরি
    const vCard = vCardParts.filter(Boolean).join("\r\n");

    // VCF file download করা
    const blob = new Blob([vCard], { type: "text/vcard;charset=utf-8" });
    const url = URL.createObjectURL(blob);
    const a = document.createElement("a");
    a.href = url;
    a.download = `${cardData.name.replace(/\s+/g, "_")}.vcf`;
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
    URL.revokeObjectURL(url);
  }
  // ================== Share Card ==================
  function shareCard() {
    const shareData = {
      title: cardData.name,
      text: `Check out ${cardData.name}'s digital business card!`,
      url: window.location.href,
    };

    if (navigator.share) {
      navigator.share(shareData).catch((err) => {
        console.log("Error sharing:", err);
        fallbackShare();
      });
    } else {
      fallbackShare();
    }
  }

  // Fallback share method
  function fallbackShare() {
    const shareUrl = window.location.href;

    // Copy to clipboard
    if (navigator.clipboard) {
      navigator.clipboard
        .writeText(shareUrl)
        .then(() => {
          alert("Link copied to clipboard!");
        })
        .catch(() => {
          showShareDialog(shareUrl);
        });
    } else {
      showShareDialog(shareUrl);
    }
  }

  function showShareDialog(url) {
    const dialog = confirm(`Share this link:\n\n${url}\n\nPress OK to copy`);
    if (dialog) {
      const textArea = document.createElement("textarea");
      textArea.value = url;
      document.body.appendChild(textArea);
      textArea.select();
      document.execCommand("copy");
      document.body.removeChild(textArea);
      alert("Link copied!");
    }
  }

  // ================== Initialize ==================
  initCard();

  // ================== Expose functions globally ==================
  window.shareCard = shareCard;
  window.saveContact = saveContact;
});
