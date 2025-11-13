document.addEventListener("DOMContentLoaded", async () => {
  let cardData = {};
  let cropper = null;
  let hasData = false;
  const csrfToken = document
    .querySelector('meta[name="csrf-token"]')
    .getAttribute("content");
  const storagePath = document
    .querySelector('meta[name="storage-path"]')
    .getAttribute("content");
  const defaultAvatar = document
    .querySelector('meta[name="default-avatar"]')
    .getAttribute("content");
  // ================== Load Card Data ==================
  async function loadCardData() {
    try {
      const response = await fetch("/user/digital-card/get", {
        headers: {
          "X-CSRF-TOKEN": csrfToken,
          Accept: "application/json",
        },
      });
      const result = await response.json();
      if (result.success && result.data) {
        hasData = true;
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
      } else {
        hasData = false;
        cardData = {
          name: "Your Name",
          designation: "",
          company: "",
          photo: defaultAvatar,
          social: {
            facebook: "",
            instagram: "",
            linkedin: "",
            twitter: "",
            youtube: "",
            tiktok: "",
            pinterest: "",
            telegram: "",
            snapchat: "",
            github: "",
          },
          contact: {
            website: "",
            mobile: "",
            email: "",
            whatsapp: "",
            address: "",
          },
        };
      }
    } catch (error) {
      console.error("Error loading data:", error);
      hasData = false;
    }
  }

  // ================== Save Card Data ==================
  async function saveCardData() {
    try {
      const response = await fetch("/user/digital-card/store", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          "X-CSRF-TOKEN": csrfToken,
          Accept: "application/json",
        },
        body: JSON.stringify({
          name: cardData.name,
          designation: cardData.designation,
          company: cardData.company,
          photo: cardData.photo,
          website: cardData.contact.website,
          mobile: cardData.contact.mobile,
          email: cardData.contact.email,
          whatsapp: cardData.contact.whatsapp,
          address: cardData.contact.address,
          facebook: cardData.social.facebook,
          instagram: cardData.social.instagram,
          linkedin: cardData.social.linkedin,
          twitter: cardData.social.twitter,
          youtube: cardData.social.youtube,
          tiktok: cardData.social.tiktok,
          pinterest: cardData.social.pinterest,
          telegram: cardData.social.telegram,
          snapchat: cardData.social.snapchat,
          github: cardData.social.github,
        }),
      });
      const result = await response.json();
      if (result.success) {
        hasData = true;
        Swal.fire({
          icon: "success",
          title: "Saved!",
          text: "Card saved successfully!",
        });
      } else {
        Swal.fire({
          icon: "error",
          title: "Error",
          text: result.message || "Error saving card.",
        });
      }
    } catch (error) {
      console.error("Error saving:", error);
      Swal.fire({
        icon: "error",
        title: "Error",
        text: "Error saving card data.",
      });
    }
  }

  // ================== Initialize Card ==================
  async function initCard() {
    await loadCardData();
    document.getElementById("fullName").textContent =
      cardData.name || "Your Name";
    document.getElementById("designation").textContent =
      cardData.designation || "";
    document.getElementById("company").textContent = cardData.company
      ? "at " + cardData.company
      : "";
    document.getElementById("profilePhoto").src = cardData.photo;
    document.getElementById("photoPreview").src = cardData.photo;
    renderSocialLinks();
    renderContactInfo();

    if (
      !hasData ||
      !cardData.name ||
      !cardData.contact.mobile ||
      !cardData.contact.address
    ) {
      setTimeout(() => openEditModal(), 500);
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
        i: "fas fa-mobile-alt",
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
        i: "fas fa-envelope",
        l: cardData.contact.email,
        href: cardData.contact.email ? `mailto:${cardData.contact.email}` : "",
      },
      {
        k: "website",
        i: "fas fa-link",
        l: cardData.contact.website,
        href: cardData.contact.website
          ? `https://${cardData.contact.website}`
          : "",
      },
      {
        k: "address",
        i: "fas fa-map-marker-alt",
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

    // সফল হলে notification দেখানো
    Swal.fire({
      icon: "success",
      title: "Success!",
      text: photoData ? "Contact saved with photo!" : "Contact saved!",
      timer: 2000,
      showConfirmButton: false,
    });
  }

  // ================== Share Card ==================
  function shareCard() {
    if (navigator.share) {
      navigator.share({
        title: cardData.name,
        text: `Check out ${cardData.name}'s card!`,
        url: location.href,
      });
    } else {
      Swal.fire({
        icon: "info",
        title: "Share this link",
        text: location.href,
      });
    }
  }
  // ================== Edit Modal ==================
  function openEditModal() {
    const modal = document.getElementById("editModal");

    // আগের মতো data ফিল্ড ফিল করা
    const inputs = [
      "Name",
      "Designation",
      "Company",
      "Website",
      "Mobile",
      "Email",
      "Whatsapp",
      "Address",
      "Facebook",
      "Instagram",
      "Linkedin",
      "Twitter",
      "YouTube",
      "TikTok",
      "Pinterest",
      "Telegram",
      "Snapchat",
      "GitHub",
    ];

    inputs.forEach((id) => {
      const el = document.getElementById("edit" + id);
      if (el) {
        if (cardData.contact.hasOwnProperty(id.toLowerCase()))
          el.value = cardData.contact[id.toLowerCase()] || "";
        else if (cardData.social.hasOwnProperty(id.toLowerCase()))
          el.value = cardData.social[id.toLowerCase()] || "";
        else if (id === "Name") el.value = cardData.name;
        else if (id === "Designation") el.value = cardData.designation;
        else if (id === "Company") el.value = cardData.company;
      }
    });

    // Required message check
    if (!cardData.name || !cardData.contact.mobile || !cardData.contact.address)
      document.getElementById("requiredMessage").classList.remove("hidden");
    else document.getElementById("requiredMessage").classList.add("hidden");

    // Show modal
    modal.classList.remove("hidden");
    modal.classList.add("flex");

    // Add backdrop (same as change photo modal)
    let backdrop = document.createElement("div");
    backdrop.id = "editModalBackdrop";
    backdrop.className =
      "fixed inset-0 z-40 transition-opacity duration-300 bg-black bg-opacity-50 opacity-0 backdrop-blur-sm";
    document.body.appendChild(backdrop);

    // Fade-in effect
    requestAnimationFrame(() => {
      backdrop.classList.add("opacity-100");
    });
  }

  function closeEditModal() {
    const modal = document.getElementById("editModal");
    const backdrop = document.getElementById("editModalBackdrop");

    // Fade-out animation (same as change photo)
    if (backdrop) {
      backdrop.classList.remove("opacity-100");
      backdrop.classList.add("opacity-0");
      setTimeout(() => backdrop.remove(), 300);
    }

    modal.classList.add("hidden");
    modal.classList.remove("flex");
  }

  // ================== Cropper Functions ==================
  function openCropModal() {
    const input = document.createElement("input");
    input.type = "file";
    input.accept = "image/*";
    input.onchange = (e) => {
      const file = e.target.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = (ev) => {
          document.getElementById("cropImage").src = ev.target.result;
          document.getElementById("cropModal").classList.remove("hidden");
          setTimeout(initCropper, 100);
        };
        reader.readAsDataURL(file);
      }
    };
    input.click();
  }

  function initCropper() {
    const image = document.getElementById("cropImage");
    if (cropper) cropper.destroy();
    cropper = new Cropper(image, {
      aspectRatio: 1,
      viewMode: 1,
      dragMode: "move",
      autoCropArea: 0.8,
      restore: false,
      guides: true,
      center: true,
      highlight: false,
      cropBoxMovable: true,
      cropBoxResizable: true,
      toggleDragModeOnDblclick: false,
    });
  }

  function cropImage() {
    if (!cropper) return;
    const canvas = cropper.getCroppedCanvas({
      width: 300,
      height: 300,
    });
    const croppedBase64 = canvas.toDataURL("image/jpeg", 0.9);
    cardData.photo = croppedBase64;
    document.getElementById("profilePhoto").src = croppedBase64;
    document.getElementById("photoPreview").src = croppedBase64;
    closeCropModal();
  }

  function closeCropModal() {
    document.getElementById("cropModal").classList.add("hidden");
    if (cropper) cropper.destroy();
    cropper = null;
  }

  // ================== Validation ==================
  const nameInput = document.getElementById("editName");
  const mobileInput = document.getElementById("editMobile");
  const whatsappInput = document.getElementById("editWhatsapp");
  const addressInput = document.getElementById("editAddress");

  function validateName() {
    if (!nameInput.value.trim()) {
      Swal.fire({ icon: "error", title: "Error", text: "Name is required" });
      return false;
    }
    return true;
  }

  function validateMobile() {
    const val = mobileInput.value.trim();
    // country code দিয়ে number শুরু হচ্ছে কিনা check
    const pattern = /^\+\d{1,4}\d{6,14}$/;
    if (!val) {
      Swal.fire({ icon: "error", title: "Error", text: "Mobile is required" });
      return false;
    } else if (!pattern.test(val)) {
      Swal.fire({
        icon: "error",
        title: "Error",
        text: "Mobile must include country code and be valid",
      });
      return false;
    }
    return true;
  }

  function validateWhatsApp() {
    const val = whatsappInput.value.trim();
    const pattern = /^\+\d{1,4}\d{6,14}$/;
    if (val && !pattern.test(val)) {
      Swal.fire({
        icon: "error",
        title: "Error",
        text: "WhatsApp must include country code and be valid",
      });
      return false;
    }
    return true;
  }

  function validateAddress() {
    if (!addressInput.value.trim()) {
      Swal.fire({ icon: "error", title: "Error", text: "Address is required" });
      return false;
    }
    return true;
  }
  // ================== Submit Form ==================
  document.getElementById("editForm").addEventListener("submit", async (e) => {
    e.preventDefault();

    const validName = validateName();
    const validMobile = validateMobile();
    const validWhatsApp = validateWhatsApp();
    const validAddress = validateAddress();

    if (!validName || !validMobile || !validWhatsApp || !validAddress) return;

    // Social link limit
    const socialInputs = [
      "editFacebook",
      "editInstagram",
      "editLinkedin",
      "editTwitter",
      "editYouTube",
      "editTikTok",
      "editPinterest",
      "editTelegram",
      "editSnapchat",
      "editGitHub",
    ];
    let filledCount = 0;
    socialInputs.forEach((id) => {
      if (document.getElementById(id).value.trim() !== "") filledCount++;
    });
    if (filledCount > 5) {
      Swal.fire({
        icon: "warning",
        title: "Too many social links",
        text: "You can only add up to 5 social network links.",
      });
      return;
    }

    // Save data
    cardData.name = nameInput.value.trim();
    cardData.designation = document
      .getElementById("editDesignation")
      .value.trim();
    cardData.company = document.getElementById("editCompany").value.trim();
    cardData.contact.website = document
      .getElementById("editWebsite")
      .value.trim();
    cardData.contact.mobile = mobileInput.value.trim();
    cardData.contact.email = document.getElementById("editEmail").value.trim();
    cardData.contact.whatsapp = whatsappInput.value.trim();
    cardData.contact.address = addressInput.value.trim();
    cardData.social.facebook = document
      .getElementById("editFacebook")
      .value.trim();
    cardData.social.instagram = document
      .getElementById("editInstagram")
      .value.trim();
    cardData.social.linkedin = document
      .getElementById("editLinkedin")
      .value.trim();
    cardData.social.twitter = document
      .getElementById("editTwitter")
      .value.trim();
    cardData.social.youtube = document
      .getElementById("editYouTube")
      .value.trim();
    cardData.social.tiktok = document.getElementById("editTikTok").value.trim();
    cardData.social.pinterest = document
      .getElementById("editPinterest")
      .value.trim();
    cardData.social.telegram = document
      .getElementById("editTelegram")
      .value.trim();
    cardData.social.snapchat = document
      .getElementById("editSnapchat")
      .value.trim();
    cardData.social.github = document.getElementById("editGitHub").value.trim();

    await saveCardData();
    initCard();
    closeEditModal();
  });

  // ================== Initialize ==================
  initCard();

  // ================== Logout Function ==================
  async function logoutUser() {
    try {
      const response = await fetch("/logout", {
        method: "POST",
        headers: {
          "X-CSRF-TOKEN": csrfToken,
          Accept: "application/json",
        },
      });

      if (response.ok) {
        // লগআউট হলে লগইন পেজে রিডিরেক্ট
        window.location.href = "/login";
      } else {
        Swal.fire({
          icon: "error",
          title: "Error",
          text: "Logout failed. Please try again.",
        });
      }
    } catch (error) {
      console.error("Logout error:", error);
      Swal.fire({
        icon: "error",
        title: "Error",
        text: "An error occurred while logging out.",
      });
    }
  }

  // ================== Expose functions globally ==================
  window.openEditModal = openEditModal;
  window.closeEditModal = closeEditModal;
  window.shareCard = shareCard;
  window.saveContact = saveContact;
  window.openCropModal = openCropModal;
  window.cropImage = cropImage;
  window.closeCropModal = closeCropModal;
  window.logoutUser = logoutUser;
});
