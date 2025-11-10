document.addEventListener('DOMContentLoaded', async () => {

    let cardData = {};
    let cropper = null;
    let hasData = false;
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const storagePath = document.querySelector('meta[name="storage-path"]').getAttribute('content');
    const defaultAvatar = document.querySelector('meta[name="default-avatar"]').getAttribute('content');
    // ================== Load Card Data ==================
    async function loadCardData() {
        try {
            const response = await fetch('/user/digital-card/get', {
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                }
            });
            const result = await response.json();
            if (result.success && result.data) {
                hasData = true;
                cardData = {
                    name: result.data.name || '',
                    title: result.data.title || '',
                    photo: result.data.photo ? storagePath + '/' + result.data.photo : defaultAvatar,
                    social: {
                        facebook: result.data.facebook || '',
                        instagram: result.data.instagram || '',
                        linkedin: result.data.linkedin || '',
                        twitter: result.data.twitter || '',
                        youtube: result.data.youtube || '',
                        tiktok: result.data.tiktok || '',
                        pinterest: result.data.pinterest || '',
                        snapchat: result.data.snapchat || '',
                        github: result.data.github || ''
                    },
                    contact: {
                        website: result.data.website || '',
                        phone: result.data.phone || '',
                        email: result.data.email || '',
                        whatsapp: result.data.whatsapp || '',
                        address: result.data.address || ''
                    }
                };
            } else {
                hasData = false;
                cardData = {
                    name: 'Your Name',
                    title: '',
                    photo: defaultAvatar,
                    social: {
                        facebook: '',
                        instagram: '',
                        linkedin: '',
                        twitter: '',
                        youtube: '',
                        tiktok: '',
                        pinterest: '',
                        snapchat: '',
                        github: ''
                    },
                    contact: {
                        website: '',
                        phone: '',
                        email: '',
                        whatsapp: '',
                        address: ''
                    }
                };
            }
        } catch (error) {
            console.error('Error loading data:', error);
            hasData = false;
        }
    }

    // ================== Save Card Data ==================
    async function saveCardData() {
        try {
            const response = await fetch('/user/digital-card/store', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    name: cardData.name,
                    title: cardData.title,
                    photo: cardData.photo,
                    website: cardData.contact.website,
                    phone: cardData.contact.phone,
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
                    snapchat: cardData.social.snapchat,
                    github: cardData.social.github
                })
            });
            const result = await response.json();
            if (result.success) {
                hasData = true;
                Swal.fire({
                    icon: 'success',
                    title: 'Saved!',
                    text: 'Card saved successfully!'
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: result.message || 'Error saving card.'
                });
            }
        } catch (error) {
            console.error('Error saving:', error);
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Error saving card data.'
            });
        }
    }

    // ================== Initialize Card ==================
    async function initCard() {
        await loadCardData();
        document.getElementById('fullName').textContent = cardData.name || 'Your Name';
        document.getElementById('title').textContent = cardData.title || '';
        document.getElementById('profilePhoto').src = cardData.photo;
        document.getElementById('photoPreview').src = cardData.photo;
        renderSocialLinks();
        renderContactInfo();

        if (!hasData || !cardData.name || !cardData.contact.phone || !cardData.contact.address) {
            setTimeout(() => openEditModal(), 500);
        }
    }

    // ================== Render Social Links ==================
    function renderSocialLinks() {
        const container = document.getElementById('socialLinks');
        container.innerHTML = '';
        const icons = {
            facebook: {
                i: 'fab fa-facebook',
                c: 'text-blue-600'
            },
            instagram: {
                i: 'fab fa-instagram',
                c: 'text-pink-600'
            },
            linkedin: {
                i: 'fab fa-linkedin',
                c: 'text-blue-700'
            },
            twitter: {
                i: 'fab fa-twitter',
                c: 'text-blue-400'
            },
            youtube: {
                i: 'fab fa-youtube',
                c: 'text-red-600'
            },
            tiktok: {
                i: 'fab fa-tiktok',
                c: 'text-black'
            },
            pinterest: {
                i: 'fab fa-pinterest',
                c: 'text-red-500'
            },
            snapchat: {
                i: 'fab fa-snapchat',
                c: 'text-yellow-400'
            },
            github: {
                i: 'fab fa-github',
                c: 'text-gray-800'
            }
        };
        Object.entries(cardData.social).forEach(([key, url]) => {
            if (url && url.trim() !== '') {
                const a = document.createElement('a');
                a.href = url;
                a.target = '_blank';
                a.className =
                    'flex items-center justify-center w-12 h-12 transition transform bg-gray-100 rounded-xl hover:bg-gray-200 hover:scale-105';
                a.innerHTML = `<i class="${icons[key].i} ${icons[key].c} text-3xl"></i>`;
                container.appendChild(a);
            }
        });
    }

    // ================== Render Contact Info ==================
    function renderContactInfo() {
        const container = document.getElementById('contactInfo');
        container.innerHTML = '';

        const items = [{
                k: 'phone',
                i: 'fas fa-mobile-alt',
                l: cardData.contact.phone,
                href: cardData.contact.phone ? `tel:${cardData.contact.phone}` : ''
            },
            {
                k: 'whatsapp',
                i: 'fab fa-whatsapp',
                l: 'WhatsApp',
                c: 'text-green-500',
                href: cardData.contact.whatsapp ?
                    `https://wa.me/${cardData.contact.whatsapp.replace(/[^0-9]/g,'')}` : ''
            },
            {
                k: 'email',
                i: 'fas fa-envelope',
                l: cardData.contact.email,
                href: cardData.contact.email ? `mailto:${cardData.contact.email}` : ''
            },
            {
                k: 'website',
                i: 'fas fa-link',
                l: cardData.contact.website,
                href: cardData.contact.website ? `https://${cardData.contact.website}` : ''
            },
            {
                k: 'address',
                i: 'fas fa-map-marker-alt',
                l: cardData.contact.address,
                href: ''
            },
        ];

        items.forEach((item, i) => {
            if (item.l && item.l.trim() !== '') {
                const div = document.createElement('div');
                div.className =
                    `flex items-center justify-between py-4 ${i<items.length-1?'border-b border-gray-200':''} hover:bg-gray-50 transition cursor-pointer rounded-lg px-3`;

                let innerWrapper;
                if (item.href) {
                    innerWrapper = document.createElement('a');
                    innerWrapper.href = item.href;
                    innerWrapper.target = '_blank';
                    innerWrapper.className = 'flex items-center gap-4';
                } else {
                    innerWrapper = document.createElement('div');
                    innerWrapper.className = 'flex items-center gap-4';
                }

                innerWrapper.innerHTML = `
        <div class="flex items-center justify-center w-10 h-10">
            <i class="${item.i} ${item.c || 'text-gray-600'} text-xl"></i>
        </div>
        <span class="font-medium text-gray-900">${item.k==='whatsapp'?item.l:item.l}</span>
    `;

                div.appendChild(innerWrapper);
                div.innerHTML += `<i class="text-gray-400 fas fa-chevron-right"></i>`;
                container.appendChild(div);
            }
        });
    }


    // ================== Save vCard ==================
    function saveContact() {
        const vCard = `BEGIN:VCARD
VERSION:3.0
FN:${cardData.name}
TITLE:${cardData.title}
TEL:${cardData.contact.phone}
EMAIL:${cardData.contact.email}
ADR:${cardData.contact.address}
URL:${cardData.contact.website}
END:VCARD`;
        const blob = new Blob([vCard], {
            type: 'text/vcard'
        });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = `${cardData.name.replace(/\s+/g,'_')}.vcf`;
        a.click();
        URL.revokeObjectURL(url);
    }

    // ================== Share Card ==================
    function shareCard() {
        if (navigator.share) {
            navigator.share({
                title: cardData.name,
                text: `Check out ${cardData.name}'s card!`,
                url: location.href
            });
        } else {
            Swal.fire({
                icon: 'info',
                title: 'Share this link',
                text: location.href
            });
        }
    }

    // ================== Edit Modal ==================
    function openEditModal() {
        const inputs = ['Name', 'Title', 'Website', 'Phone', 'Email', 'Whatsapp', 'Address', 'Facebook',
            'Instagram', 'Linkedin', 'Twitter', 'YouTube', 'TikTok', 'Pinterest', 'Snapchat',
            'GitHub'
        ];
        inputs.forEach(id => {
            const el = document.getElementById('edit' + id);
            if (el) {
                if (cardData.contact.hasOwnProperty(id.toLowerCase())) el.value = cardData
                    .contact[id.toLowerCase()] || '';
                else if (cardData.social.hasOwnProperty(id.toLowerCase())) el.value = cardData
                    .social[id.toLowerCase()] || '';
                else if (id === 'Name') el.value = cardData.name;
                else if (id === 'Title') el.value = cardData.title;
            }
        });
        if (!cardData.name || !cardData.contact.phone || !cardData.contact.address) document
            .getElementById('requiredMessage').classList.remove('hidden');
        else document.getElementById('requiredMessage').classList.add('hidden');
        document.getElementById('editModal').classList.remove('hidden');
    }

    function closeEditModal() {
        document.getElementById('editModal').classList.add('hidden');
    }

    // ================== Cropper Functions ==================
    function openCropModal() {
        const input = document.createElement('input');
        input.type = 'file';
        input.accept = 'image/*';
        input.onchange = e => {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = ev => {
                    document.getElementById('cropImage').src = ev.target.result;
                    document.getElementById('cropModal').classList.remove('hidden');
                    setTimeout(initCropper, 100);
                };
                reader.readAsDataURL(file);
            }
        };
        input.click();
    }

    function initCropper() {
        const image = document.getElementById('cropImage');
        if (cropper) cropper.destroy();
        cropper = new Cropper(image, {
            aspectRatio: 1,
            viewMode: 1,
            dragMode: 'move',
            autoCropArea: 0.8,
            restore: false,
            guides: true,
            center: true,
            highlight: false,
            cropBoxMovable: true,
            cropBoxResizable: true,
            toggleDragModeOnDblclick: false
        });
    }

    function cropImage() {
        if (!cropper) return;
        const canvas = cropper.getCroppedCanvas({
            width: 300,
            height: 300
        });
        const croppedBase64 = canvas.toDataURL('image/jpeg', 0.9);
        cardData.photo = croppedBase64;
        document.getElementById('profilePhoto').src = croppedBase64;
        document.getElementById('photoPreview').src = croppedBase64;
        closeCropModal();
    }

    function closeCropModal() {
        document.getElementById('cropModal').classList.add('hidden');
        if (cropper) cropper.destroy();
        cropper = null;
    }

    // ================== Validation ==================
    const nameInput = document.getElementById('editName');
    const phoneInput = document.getElementById('editPhone');
    const addressInput = document.getElementById('editAddress');
    const errorName = document.getElementById('errorName');
    const errorPhone = document.getElementById('errorPhone');
    const errorAddress = document.getElementById('errorAddress');

    function validateField(input, errorElement) {
        if (!input.value.trim()) {
            input.classList.add('border-red-500');
            errorElement.classList.remove('hidden');
            return false;
        } else {
            input.classList.remove('border-red-500');
            errorElement.classList.add('hidden');
            return true;
        }
    }

    nameInput.addEventListener('input', () => validateField(nameInput, errorName));
    phoneInput.addEventListener('input', () => validateField(phoneInput, errorPhone));
    addressInput.addEventListener('input', () => validateField(addressInput, errorAddress));

    // ================== Submit Form ==================
    document.getElementById('editForm').addEventListener('submit', async e => {
        e.preventDefault();
        const validName = validateField(nameInput, errorName);
        const validPhone = validateField(phoneInput, errorPhone);
        const validAddress = validateField(addressInput, errorAddress);
        if (!validName || !validPhone || !validAddress) return;

        const socialInputs = ['editFacebook', 'editInstagram', 'editLinkedin',
            'editTwitter', 'editYouTube', 'editTikTok', 'editPinterest', 'editSnapchat',
            'editGitHub'
        ];
        let filledCount = 0;
        socialInputs.forEach(id => {
            if (document.getElementById(id).value.trim() !== '') filledCount++;
        });
        if (filledCount > 5) {
            Swal.fire({
                icon: 'warning',
                title: 'Too many social links',
                text: 'You can only add up to 5 social network links.'
            });
            return;
        }

        cardData.name = nameInput.value.trim();
        cardData.title = document.getElementById('editTitle').value.trim();
        cardData.contact.website = document.getElementById('editWebsite').value.trim();
        cardData.contact.phone = phoneInput.value.trim();
        cardData.contact.email = document.getElementById('editEmail').value.trim();
        cardData.contact.whatsapp = document.getElementById('editWhatsapp').value.trim();
        cardData.contact.address = addressInput.value.trim();
        cardData.social.facebook = document.getElementById('editFacebook').value.trim();
        cardData.social.instagram = document.getElementById('editInstagram').value.trim();
        cardData.social.linkedin = document.getElementById('editLinkedin').value.trim();
        cardData.social.twitter = document.getElementById('editTwitter').value.trim();
        cardData.social.youtube = document.getElementById('editYouTube').value.trim();
        cardData.social.tiktok = document.getElementById('editTikTok').value.trim();
        cardData.social.pinterest = document.getElementById('editPinterest').value.trim();
        cardData.social.snapchat = document.getElementById('editSnapchat').value.trim();
        cardData.social.github = document.getElementById('editGitHub').value.trim();

        await saveCardData();
        initCard();
        closeEditModal();
    });

    // ================== Modal background click ==================
    document.getElementById('editModal').addEventListener('click', e => {
        if (e.target === document.getElementById('editModal')) closeEditModal();
    });
    document.getElementById('cropModal')?.addEventListener('click', e => {
        if (e.target === document.getElementById('cropModal')) closeCropModal();
    });

    // ================== Initialize ==================
    initCard();

    // ================== Logout Function ==================
    async function logoutUser() {
        try {
            const response = await fetch('/logout', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                }
            });

            if (response.ok) {
                // লগআউট হলে লগইন পেজে রিডিরেক্ট
                window.location.href = '/login';
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Logout failed. Please try again.'
                });
            }
        } catch (error) {
            console.error('Logout error:', error);
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'An error occurred while logging out.'
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
