<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="digital-card-get" content="{{ route('user.digital-card.get') }}">
    <meta name="storage-path" content="{{ asset('storage') }}">
    <meta name="default-avatar" content="{{ asset('assets/images/avatar/dummy.png') }}">
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
            class="fixed z-50 flex items-center gap-2 px-4 py-2 text-sm transition rounded-lg shadow-lg text-dark-900 top-4 left-4 bg-white/90 backdrop-blur-sm hover:bg-white">
            <i class="fas fa-edit"></i> Edit
        </button>
        <button onclick="logoutUser()"
            class="fixed z-50 px-4 py-2 text-sm transition rounded-lg shadow-lg text-dark-900 top-4 right-4 bg-white/90 backdrop-blur-sm hover:bg-white">
            <i class="fas fa-sign-out-alt"></i> Logout
        </button>

        <div
            class="relative flex flex-col items-center px-6 pt-24 pb-6 bg-gradient-to-b from-gray-700 via-gray-900 to-black">
            <div class="-mt-10 overflow-hidden border-4 border-white rounded-full shadow-lg w-45 h-45">
                <img id="profilePhoto" src="{{ asset('assets/images/avatar/dummy.png') }}" alt="Profile"
                    class="object-cover w-full h-full">
            </div>
            <div class="mt-4 text-center">
                <h1 id="fullName" class="mb-1 text-2xl font-bold text-white">Your Name</h1>
                <p id="title" class="mb-1 text-gray-100 text-md">Your Title</p>
            </div>
        </div>

        <div class="px-6 py-4">
            <button onclick="saveContact()"
                class="w-full px-6 py-3 text-lg font-medium text-white transition rounded-lg bg-zinc-900 hover:bg-zinc-800 ">
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
    <div id="editModal"
        class="fixed inset-0 z-50 flex items-center justify-center hidden p-4 bg-black/70 backdrop-blur-sm">
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-lg max-h-[90vh] overflow-y-auto p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-xl font-bold text-gray-900">Edit Card</h3>
                <button onclick="closeEditModal()" class="text-gray-500 hover:text-gray-700">
                    <i class="text-xl fas fa-times"></i>
                </button>
            </div>
            <div id="requiredMessage"
                class="flex items-start hidden gap-2 p-4 mb-4 text-sm text-red-800 border border-red-200 rounded-lg bg-red-50">
                <i class="fas fa-info-circle mt-0.5"></i>
                <p>You must provide Name, Phone, and Address to activate your digital card.</p>
            </div>
            <form id="editForm" class="space-y-4">
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-700">Profile Photo</label>
                    <div class="flex items-center gap-4">
                        <img id="photoPreview" src="" alt="Preview"
                            class="object-cover w-20 h-20 border-2 border-gray-300 rounded-full">
                        <button type="button" onclick="openCropModal()"
                            class="px-4 py-2 text-sm font-medium text-gray-100 transition rounded-lg bg-zinc-800 hover:bg-zinc-500">
                            Change Photo
                        </button>
                    </div>
                </div>

                <div>
                    <label for="editName" class="block mb-1 text-sm font-medium text-gray-700">Full Name <span
                            class="text-red-600">*</span></label>
                    <input type="text" id="editName"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                    <small id="errorName" class="hidden text-xs text-red-600">Name is required</small>
                </div>
                <div>
                    <label for="editTitle" class="block mb-1 text-sm font-medium text-gray-700">Designation</label>
                    <input type="text" id="editTitle" placeholder="Designation"
                        class="w-full px-4 py-2 border rounded-lg">
                </div>

                <hr class="my-4">
                <h4 class="mb-3 font-semibold text-gray-800">Contact</h4>
                <div>
                    <label for="editWebsite" class="block mb-1 text-sm font-medium text-gray-700">Website</label>
                    <input type="text" id="editWebsite" placeholder="Website"
                        class="w-full px-4 py-2 border rounded-lg">
                </div>
                <div>
                    <label for="editPhone" class="block mb-1 text-sm font-medium text-gray-700">Phone <span
                            class="text-red-600">*</span></label>
                    <input type="tel" id="editPhone"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                    <small id="errorPhone" class="hidden text-xs text-red-600">Phone is required</small>
                </div>
                <div>
                    <label for="editEmail" class="block mb-1 text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="editEmail" placeholder="Email"
                        class="w-full px-4 py-2 border rounded-lg">
                </div>
                <div>
                    <label for="editWhatsapp" class="block mb-1 text-sm font-medium text-gray-700">WhatsApp</label>
                    <input type="tel" id="editWhatsapp" placeholder="WhatsApp"
                        class="w-full px-4 py-2 border rounded-lg">
                </div>
                <div>
                    <label for="editAddress" class="block mb-1 text-sm font-medium text-gray-700">Address <span
                            class="text-red-600">*</span></label>
                    <input type="text" id="editAddress"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                    <small id="errorAddress" class="hidden text-xs text-red-600">Address is required</small>
                </div>

                <hr class="my-4">
                <h4 class="mb-3 font-semibold text-gray-800">Social</h4>
                <div>
                    <label for="editFacebook" class="block mb-1 text-sm font-medium text-gray-700">Facebook</label>
                    <input type="url" id="editFacebook" placeholder="Facebook"
                        class="w-full px-4 py-2 border rounded-lg">
                </div>

                <div>
                    <label for="editInstagram" class="block mb-1 text-sm font-medium text-gray-700">Instagram</label>
                    <input type="url" id="editInstagram" placeholder="Instagram"
                        class="w-full px-4 py-2 border rounded-lg">
                </div>

                <div>
                    <label for="editLinkedin" class="block mb-1 text-sm font-medium text-gray-700">LinkedIn</label>
                    <input type="url" id="editLinkedin" placeholder="LinkedIn"
                        class="w-full px-4 py-2 border rounded-lg">
                </div>

                <div>
                    <label for="editTwitter" class="block mb-1 text-sm font-medium text-gray-700">Twitter</label>
                    <input type="url" id="editTwitter" placeholder="Twitter"
                        class="w-full px-4 py-2 border rounded-lg">
                </div>

                <div>
                    <label for="editYouTube" class="block mb-1 text-sm font-medium text-gray-700">YouTube</label>
                    <input type="url" id="editYouTube" placeholder="YouTube"
                        class="w-full px-4 py-2 border rounded-lg">
                </div>

                <div>
                    <label for="editTikTok" class="block mb-1 text-sm font-medium text-gray-700">TikTok</label>
                    <input type="url" id="editTikTok" placeholder="TikTok"
                        class="w-full px-4 py-2 border rounded-lg">
                </div>

                <div>
                    <label for="editPinterest" class="block mb-1 text-sm font-medium text-gray-700">Pinterest</label>
                    <input type="url" id="editPinterest" placeholder="Pinterest"
                        class="w-full px-4 py-2 border rounded-lg">
                </div>

                <div>
                    <label for="editSnapchat" class="block mb-1 text-sm font-medium text-gray-700">Snapchat</label>
                    <input type="url" id="editSnapchat" placeholder="Snapchat"
                        class="w-full px-4 py-2 border rounded-lg">
                </div>

                <div>
                    <label for="editGitHub" class="block mb-1 text-sm font-medium text-gray-700">GitHub</label>
                    <input type="url" id="editGitHub" placeholder="GitHub"
                        class="w-full px-4 py-2 border rounded-lg">
                </div>

                <div class="flex gap-3 pt-4">
                    <button type="button" onclick="closeEditModal()"
                        class="flex-1 py-3 font-medium text-gray-700 border border-gray-300 rounded-lg hover:bg-gray-50">
                        Cancel
                    </button>
                    <button type="submit"
                        class="flex-1 py-3 font-medium text-white rounded-lg bg-zinc-900 hover:bg-zinc-800">
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('assets/js/digital-card.js') }}"></script>
</body>

</html>
