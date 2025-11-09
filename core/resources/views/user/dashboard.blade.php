<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Digital Business Card</title>

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <style>
        html,
        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: hidden;
        }

        * {
            -webkit-tap-highlight-color: transparent;
        }

        .cropper-container {
            max-height: 70vh;
        }
    </style>
</head>

<body class="flex items-center justify-center h-screen p-0 bg-gray-100">
    <div class="w-full h-full overflow-y-auto bg-white">
        <button onclick="openEditModal()"
            class="fixed z-50 flex items-center gap-2 px-4 py-2 text-sm text-blue-900 transition rounded-lg shadow-lg top-4 left-4 bg-white/90 backdrop-blur-sm hover:bg-white">
            <i class="fas fa-edit"></i> Edit
        </button>
        <button onclick="shareCard()"
            class="fixed z-50 px-4 py-2 text-sm text-blue-900 transition rounded-lg shadow-lg top-4 right-4 bg-white/90 backdrop-blur-sm hover:bg-white">
            Share
        </button>

        <div class="relative flex flex-col items-center px-6 pt-24 pb-6 bg-gradient-to-br from-blue-900 to-blue-700">
            <div class="-mt-10 overflow-hidden border-4 border-white rounded-full shadow-lg w-45 h-45">
                <img id="profilePhoto" src="https://via.placeholder.com/300" alt="Profile"
                    class="object-cover w-full h-full">
            </div>
            <div class="mt-4 text-center">
                <h1 id="fullName" class="mb-1 text-2xl font-bold text-white">Your Name</h1>
                <p id="title" class="mb-1 text-blue-100 text-md">Your Title</p>
            </div>
        </div>

        <div class="px-6 py-4">
            <button onclick="saveContact()"
                class="w-full px-6 py-3 text-lg font-medium text-white transition bg-blue-900 rounded-lg hover:bg-blue-800">
                Save Contact
            </button>
        </div>

        <div class="px-6 py-4">
            <h2 class="mb-4 text-lg font-bold text-gray-900">Social networks</h2>
            <div id="socialLinks" class="flex justify-center gap-6 sm:justify-start"></div>
        </div>
        <div class="px-6 py-4 pb-8">
            <h2 class="mb-4 text-lg font-bold text-gray-900">Contact info.</h2>
            <div id="contactInfo"></div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div id="editModal" class="fixed inset-0 z-50 flex items-center justify-center hidden p-4 bg-black/70 backdrop-blur-sm">
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-lg max-h-[90vh] overflow-y-auto p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-xl font-bold text-gray-900">Edit Card</h3>
                <button onclick="closeEditModal()" class="text-gray-500 hover:text-gray-700">
                    <i class="text-xl fas fa-times"></i>
                </button>
            </div>

            <form id="editForm" class="space-y-4">
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-700">Profile Photo</label>
                    <div class="flex items-center gap-4">
                        <img id="photoPreview" src="" alt="Preview"
                            class="object-cover w-20 h-20 border-2 border-gray-300 rounded-full">
                        <button type="button" onclick="openCropModal()"
                            class="px-4 py-2 text-sm font-medium text-blue-700 transition bg-blue-100 rounded-lg hover:bg-blue-200">
                            Change Photo
                        </button>
                    </div>
                </div>

                <div><input type="text" id="editName" required placeholder="Full Name"
                        class="w-full px-4 py-2 border rounded-lg"></div>
                <div><input type="text" id="editTitle" placeholder="Title"
                        class="w-full px-4 py-2 border rounded-lg"></div>

                <hr class="my-4">
                <h4 class="mb-3 font-semibold text-gray-800">Contact</h4>
                <div><input type="text" id="editWebsite" placeholder="Website"
                        class="w-full px-4 py-2 border rounded-lg"></div>
                <div><input type="tel" id="editPhone" placeholder="Phone"
                        class="w-full px-4 py-2 border rounded-lg"></div>
                <div><input type="email" id="editEmail" placeholder="Email"
                        class="w-full px-4 py-2 border rounded-lg"></div>
                <div><input type="tel" id="editWhatsapp" placeholder="WhatsApp"
                        class="w-full px-4 py-2 border rounded-lg"></div>
                <div><input type="text" id="editAddress" placeholder="Address"
                        class="w-full px-4 py-2 border rounded-lg"></div>

                <hr class="my-4">
                <h4 class="mb-3 font-semibold text-gray-800">Social</h4>
                <div><input type="url" id="editFacebook" placeholder="Facebook"
                        class="w-full px-4 py-2 border rounded-lg"></div>
                <div><input type="url" id="editInstagram" placeholder="Instagram"
                        class="w-full px-4 py-2 border rounded-lg"></div>
                <div><input type="url" id="editLinkedin" placeholder="LinkedIn"
                        class="w-full px-4 py-2 border rounded-lg"></div>
                <div><input type="url" id="editTwitter" placeholder="Twitter"
                        class="w-full px-4 py-2 border rounded-lg"></div>
                <div><input type="url" id="editYouTube" placeholder="YouTube"
                        class="w-full px-4 py-2 border rounded-lg"></div>
                <div><input type="url" id="editTikTok" placeholder="TikTok"
                        class="w-full px-4 py-2 border rounded-lg"></div>
                <div><input type="url" id="editPinterest" placeholder="Pinterest"
                        class="w-full px-4 py-2 border rounded-lg"></div>
                <div><input type="url" id="editSnapchat" placeholder="Snapchat"
                        class="w-full px-4 py-2 border rounded-lg"></div>
                <div><input type="url" id="editGitHub" placeholder="GitHub"
                        class="w-full px-4 py-2 border rounded-lg"></div>

                <div class="flex gap-3 pt-4">
                    <button type="button" onclick="closeEditModal()"
                        class="flex-1 py-3 font-medium text-gray-700 border border-gray-300 rounded-lg hover:bg-gray-50">
                        Cancel
                    </button>
                    <button type="submit"
                        class="flex-1 py-3 font-medium text-white bg-blue-900 rounded-lg hover:bg-blue-800">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Crop Modal -->
    <div id="cropModal" class="fixed inset-0 z-50 flex-col items-center justify-center hidden p-4 bg-black/80">
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-lg max-h-[90vh] flex flex-col">
            <div class="flex items-center justify-between p-4 border-b">
                <h3 class="text-lg font-bold">Crop Photo</h3>
                <button onclick="closeCropModal()" class="text-gray-500 hover:text-gray-700">
                    <i class="text-xl fas fa-times"></i>
                </button>
            </div>
            <div class="flex-1 p-4 overflow-hidden">
                <img id="cropImage" src="" alt="Crop" class="max-w-full max-h-full">
            </div>
            <div class="flex gap-3 p-4 border-t">
                <button onclick="cancelCrop()"
                    class="flex-1 py-2 font-medium text-gray-700 border border-gray-300 rounded-lg">
                    Cancel
                </button>
                <button onclick="cropImage()"
                    class="flex-1 py-2 font-medium text-white bg-blue-900 rounded-lg hover:bg-blue-800">
                    Crop & Save
                </button>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.js"></script>
    <script>
        let cardData = {};
        let cropper = null;
        let hasData = false;

        // Setup CSRF token for Ajax
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        async function loadCardData() {
            try {
                const response = await fetch('{{ route('user.digital-card.get') }}', {
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
                        photo: result.data.photo ? '{{ asset('storage') }}/' + result.data.photo : 'https://via.placeholder.com/300',
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
                        name: '{{ Auth::user()->name }}',
                        title: '',
                        photo: 'https://via.placeholder.com/300',
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
                            email: '{{ Auth::user()->email }}',
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

        async function saveCardData() {
            try {
                const response = await fetch('{{ route('user.digital-card.store') }}', {
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
                    alert('Card saved successfully!');
                } else {
                    alert('Error saving card: ' + result.message);
                }
            } catch (error) {
                console.error('Error saving:', error);
                alert('Error saving card data');
            }
        }

        async function initCard() {
            await loadCardData();
            document.getElementById('fullName').textContent = cardData.name || 'Your Name';
            document.getElementById('title').textContent = cardData.title || '';
            document.getElementById('profilePhoto').src = cardData.photo;
            document.getElementById('photoPreview').src = cardData.photo;
            renderSocialLinks();
            renderContactInfo();

            // Open modal if no data exists
            if (!hasData) {
                setTimeout(() => openEditModal(), 500);
            }
        }

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
                if (url) {
                    const a = document.createElement('a');
                    a.href = url;
                    a.target = '_blank';
                    a.className = `${icons[key].c} hover:scale-110 transition`;
                    a.innerHTML = `<i class="${icons[key].i} text-4xl"></i>`;
                    container.appendChild(a);
                }
            });
        }

        function renderContactInfo() {
            const container = document.getElementById('contactInfo');
            container.innerHTML = '';
            const items = [{
                    k: 'website',
                    i: 'fas fa-link',
                    l: cardData.contact.website,
                    a: () => window.open(`https://${cardData.contact.website}`, '_blank')
                },
                {
                    k: 'phone',
                    i: 'fas fa-mobile-alt',
                    l: cardData.contact.phone,
                    a: () => location.href = `tel:${cardData.contact.phone}`
                },
                {
                    k: 'email',
                    i: 'fas fa-envelope',
                    l: cardData.contact.email,
                    a: () => location.href = `mailto:${cardData.contact.email}`
                },
                {
                    k: 'whatsapp',
                    i: 'fab fa-whatsapp',
                    l: 'WhatsApp',
                    c: 'text-green-500',
                    a: () => window.open(`https://wa.me/${cardData.contact.whatsapp.replace(/[^0-9]/g, '')}`, '_blank')
                },
                {
                    k: 'address',
                    i: 'fas fa-map-marker-alt',
                    l: cardData.contact.address,
                    a: () => {}
                }
            ];

            items.forEach((item, i) => {
                if (cardData.contact[item.k]) {
                    const div = document.createElement('div');
                    div.className =
                        `flex items-center justify-between py-4 ${i < items.length - 1 ? 'border-b border-gray-200' : ''} hover:bg-gray-50 transition cursor-pointer rounded-lg px-3`;
                    div.onclick = item.a;
                    div.innerHTML =
                        `<div class="flex items-center gap-4"><div class="flex items-center justify-center w-10 h-10"><i class="${item.i} ${item.c || 'text-gray-600'} text-xl"></i></div><span class="font-medium text-gray-900">${item.l}</span></div><i class="text-gray-400 fas fa-chevron-right"></i>`;
                    container.appendChild(div);
                }
            });
        }

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
            a.download = `${cardData.name.replace(/\s+/g, '_')}.vcf`;
            a.click();
            URL.revokeObjectURL(url);
        }

        function shareCard() {
            if (navigator.share) {
                navigator.share({
                    title: cardData.name,
                    text: `Check out ${cardData.name}'s card!`,
                    url: location.href
                });
            } else {
                alert('Share: ' + location.href);
            }
        }

        function openEditModal() {
            document.getElementById('editName').value = cardData.name || '';
            document.getElementById('editTitle').value = cardData.title || '';
            document.getElementById('editWebsite').value = cardData.contact.website || '';
            document.getElementById('editPhone').value = cardData.contact.phone || '';
            document.getElementById('editEmail').value = cardData.contact.email || '';
            document.getElementById('editWhatsapp').value = cardData.contact.whatsapp || '';
            document.getElementById('editAddress').value = cardData.contact.address || '';
            document.getElementById('editFacebook').value = cardData.social.facebook || '';
            document.getElementById('editInstagram').value = cardData.social.instagram || '';
            document.getElementById('editLinkedin').value = cardData.social.linkedin || '';
            document.getElementById('editTwitter').value = cardData.social.twitter || '';
            document.getElementById('editYouTube').value = cardData.social.youtube || '';
            document.getElementById('editTikTok').value = cardData.social.tiktok || '';
            document.getElementById('editPinterest').value = cardData.social.pinterest || '';
            document.getElementById('editSnapchat').value = cardData.social.snapchat || '';
            document.getElementById('editGitHub').value = cardData.social.github || '';
            document.getElementById('editModal').classList.remove('hidden');
        }

        function closeEditModal() {
            document.getElementById('editModal').classList.add('hidden');
        }

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

        function closeCropModal() {
            document.getElementById('cropModal').classList.add('hidden');
            if (cropper) cropper.destroy();
            cropper = null;
        }

        function cancelCrop() {
            closeCropModal();
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
                toggleDragModeOnDblclick: false,
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

        document.getElementById('editForm').addEventListener('submit', async e => {
            e.preventDefault();
            cardData.name = document.getElementById('editName').value.trim();
            cardData.title = document.getElementById('editTitle').value.trim();
            cardData.contact.website = document.getElementById('editWebsite').value.trim();
            cardData.contact.phone = document.getElementById('editPhone').value.trim();
            cardData.contact.email = document.getElementById('editEmail').value.trim();
            cardData.contact.whatsapp = document.getElementById('editWhatsapp').value.trim();
            cardData.contact.address = document.getElementById('editAddress').value.trim();
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

        document.getElementById('editModal').addEventListener('click', e => {
            if (e.target === document.getElementById('editModal')) closeEditModal();
        });
        document.getElementById('cropModal').addEventListener('click', e => {
            if (e.target === document.getElementById('cropModal')) closeCropModal();
        });

        document.addEventListener('DOMContentLoaded', initCard);
    </script>
</body>

</html>
