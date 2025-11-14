@extends('user.layouts.master')

@section('title', 'User Profile')

@push('meta')
<meta name="digital-card-get" content="{{ route('user.digital-card.get') }}">
@endpush

@push('styles')
<link rel="stylesheet" href="{{ asset('main/css/cropper.min.css') }}">
@endpush

@section('content')
    <div class="w-full h-full overflow-y-auto bg-white">
        <!-- Top Buttons -->
        <div class="fixed z-50 flex gap-2 top-4 left-4">
            <button onclick="openEditModal()"
                class="flex items-center gap-2 px-4 py-2 text-sm transition rounded-lg shadow-lg text-dark-900 bg-white/90 backdrop-blur-sm hover:bg-white">
                <i class="fa-regular fa-pen-to-square"></i>
            </button>
            <button onclick="openSecurityModal()"
                class="flex items-center gap-2 px-4 py-2 text-sm transition rounded-lg shadow-lg text-dark-900 bg-white/90 backdrop-blur-sm hover:bg-white">
                <i class="fa-regular fa-shield-halved"></i>
            </button>
        </div>

        <button onclick="logoutUser()"
            class="fixed z-50 px-4 py-2 text-sm transition rounded-lg shadow-lg text-dark-900 top-4 right-4 bg-white/90 backdrop-blur-sm hover:bg-white">
            <i class="fa-regular fa-arrow-right-from-bracket"></i>
        </button>

        <div
            class="relative flex flex-col items-center px-6 pt-24 pb-6 bg-linear-to-b from-gray-800 via-gray-900 to-black">
            <div class="-mt-10 overflow-hidden border-4 border-white rounded-full shadow-lg w-45 h-45">
                <img id="profilePhoto" src="{{ asset('assets/images/avatar/dummy.png') }}" alt="Profile"
                    class="object-cover w-full h-full">
            </div>
            <div class="mt-4 text-center">
                <h1 id="fullName" class="mb-1 text-2xl font-bold text-white">Your Name</h1>
                <p id="designation" class="mb-1 text-gray-100 text-md">Your Designation</p>
                <p id="company" class="mb-1 text-gray-100 text-md">Your Company</p>
            </div>
        </div>

        <div class="px-6 py-4">
            <button onclick="saveContact()"
                class="w-full px-6 py-3 text-lg font-medium text-white transition rounded-lg bg-zinc-900 hover:bg-zinc-800 ">
                Save Contact
            </button>
        </div>

        <div class="px-6 py-4">
            <h2 class="mb-4 text-lg font-bold text-gray-900">Social Networks</h2>
            <div id="socialLinks" class="flex justify-center gap-6 sm:justify-start"></div>
        </div>
        <div class="px-6 py-4 pb-8">
            <h2 class="mb-4 text-lg font-bold text-gray-900">Contact Info</h2>
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
                <p>You must provide Name, Mobile, and Address to activate your digital card.</p>
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
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-gray-500">
                    <small id="errorName" class="hidden text-xs text-red-600">Name is required</small>
                </div>
                <div>
                    <label for="editDesignation"
                        class="block mb-1 text-sm font-medium text-gray-700">Designation</label>
                    <input type="text" id="editDesignation" placeholder="Designation"
                        class="w-full px-4 py-2 border rounded-lg">
                </div>
                <div>
                    <label for="editCompany" class="block mb-1 text-sm font-medium text-gray-700">Company</label>
                    <input type="text" id="editCompany" placeholder="Company"
                        class="w-full px-4 py-2 border rounded-lg">
                </div>

                <hr class="my-4">
                <h4 class="mb-3 font-semibold text-gray-800">Contact</h4>
                <div>
                    <label for="editWebsite" class="block mb-1 text-sm font-medium text-gray-700">Website</label>
                    <input type="text" id="editWebsite" placeholder="example.com"
                        class="w-full px-4 py-2 border rounded-lg">
                </div>

                <div>
                    <label for="editMobile" class="block mb-1 text-sm font-medium text-gray-700">Mobile <span
                            class="text-red-600">*</span></label>
                    <input type="tel" id="editMobile" placeholder="Enter phone number"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-gray-500">
                    <small id="phoneHint" class="block mt-1 text-xs text-gray-500">Must be used country code</small>
                    <small id="errorMobile" class="hidden text-xs text-red-600">Mobile is required</small>
                </div>

                <div>
                    <label for="editEmail" class="block mb-1 text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="editEmail" placeholder="Email"
                        class="w-full px-4 py-2 border rounded-lg">
                </div>

                <div>
                    <label for="editWhatsapp" class="block mb-1 text-sm font-medium text-gray-700">WhatsApp</label>
                    <input type="tel" id="editWhatsapp" placeholder="WhatsApp number"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-gray-500">
                    <small id="whatsappHint" class="block mt-1 text-xs text-gray-500">Must be used country
                        code</small>
                    <small id="errorWhatsapp" class="hidden text-xs text-red-600">Invalid WhatsApp number</small>
                </div>
                <div>
                    <label for="editAddress" class="block mb-1 text-sm font-medium text-gray-700">Address <span
                            class="text-red-600">*</span></label>
                    <input type="text" id="editAddress" placeholder="Full address"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-gray-500">
                    <small id="errorAddress" class="hidden text-xs text-red-600">Address is required</small>
                </div>

                <hr class="my-4">
                <h4 class="mb-3 font-semibold text-gray-800">Social Networks (Maximum 5)</h4>
                <div>
                    <label for="editFacebook" class="block mb-1 text-sm font-medium text-gray-700">Facebook</label>
                    <input type="url" id="editFacebook" placeholder="https://facebook.com/username"
                        class="w-full px-4 py-2 border rounded-lg">
                </div>

                <div>
                    <label for="editInstagram" class="block mb-1 text-sm font-medium text-gray-700">Instagram</label>
                    <input type="url" id="editInstagram" placeholder="https://instagram.com/username"
                        class="w-full px-4 py-2 border rounded-lg">
                </div>

                <div>
                    <label for="editLinkedin" class="block mb-1 text-sm font-medium text-gray-700">LinkedIn</label>
                    <input type="url" id="editLinkedin" placeholder="https://linkedin.com/in/username"
                        class="w-full px-4 py-2 border rounded-lg">
                </div>

                <div>
                    <label for="editTwitter" class="block mb-1 text-sm font-medium text-gray-700">Twitter</label>
                    <input type="url" id="editTwitter" placeholder="https://twitter.com/username"
                        class="w-full px-4 py-2 border rounded-lg">
                </div>

                <div>
                    <label for="editYouTube" class="block mb-1 text-sm font-medium text-gray-700">YouTube</label>
                    <input type="url" id="editYouTube" placeholder="https://youtube.com/channel/..."
                        class="w-full px-4 py-2 border rounded-lg">
                </div>

                <div>
                    <label for="editTikTok" class="block mb-1 text-sm font-medium text-gray-700">TikTok</label>
                    <input type="url" id="editTikTok" placeholder="https://tiktok.com/@username"
                        class="w-full px-4 py-2 border rounded-lg">
                </div>

                <div>
                    <label for="editPinterest" class="block mb-1 text-sm font-medium text-gray-700">Pinterest</label>
                    <input type="url" id="editPinterest" placeholder="https://pinterest.com/username"
                        class="w-full px-4 py-2 border rounded-lg">
                </div>

                <div>
                    <label for="editTelegram" class="block mb-1 text-sm font-medium text-gray-700">Telegram</label>
                    <input type="url" id="editTelegram" placeholder="https://t.me/username"
                        class="w-full px-4 py-2 border rounded-lg">
                </div>

                <div>
                    <label for="editSnapchat" class="block mb-1 text-sm font-medium text-gray-700">Snapchat</label>
                    <input type="url" id="editSnapchat" placeholder="https://snapchat.com/add/username"
                        class="w-full px-4 py-2 border rounded-lg">
                </div>

                <div>
                    <label for="editGitHub" class="block mb-1 text-sm font-medium text-gray-700">GitHub</label>
                    <input type="url" id="editGitHub" placeholder="https://github.com/username"
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

    <!-- Security Modal -->
    <div id="securityModal"
        class="fixed inset-0 z-50 flex items-center justify-center hidden p-4 bg-black/70 backdrop-blur-sm">
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-lg max-h-[90vh] overflow-y-auto p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-xl font-bold text-gray-900">Security Settings</h3>
                <button onclick="closeSecurityModal()" class="text-gray-500 hover:text-gray-700">
                    <i class="text-xl fas fa-times"></i>
                </button>
            </div>

            <div class="flex items-start gap-2 p-4 mb-4 text-sm text-gray-800 border border-gray-200 rounded-lg bg-gray-50">
                <i class="fas fa-info-circle mt-0.5"></i>
                <p>Update your login credentials. You can use either mobile or email to log in. Password is optional.</p>
            </div>

            <form id="securityForm" class="space-y-4">
                <div>
                    <label for="securityLoginMobile" class="block mb-1 text-sm font-medium text-gray-700">
                        Login Mobile
                    </label>
                    <input type="tel" id="securityLoginMobile" placeholder="+8801XXXXXXXXX"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-gray-500">
                    <small class="block mt-1 text-xs text-gray-500">Include country code (e.g., +880)</small>
                </div>

                <div>
                    <label for="securityLoginEmail" class="block mb-1 text-sm font-medium text-gray-700">
                        Login Email
                    </label>
                    <input type="email" id="securityLoginEmail" placeholder="your@email.com"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-gray-500">
                </div>

                <hr class="my-4">
                <h4 class="mb-3 font-semibold text-gray-800">Change Password (Optional)</h4>

                <div>
                    <label for="securityCurrentPassword" class="block mb-1 text-sm font-medium text-gray-700">
                        Current Password
                    </label>
                    <input type="password" id="securityCurrentPassword" placeholder="Enter current password"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-gray-500">
                    <small class="block mt-1 text-xs text-gray-500">Required if changing password</small>
                </div>

                <div>
                    <label for="securityNewPassword" class="block mb-1 text-sm font-medium text-gray-700">
                        New Password
                    </label>
                    <input type="password" id="securityNewPassword" placeholder="Enter new password"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-gray-500">
                    <small class="block mt-1 text-xs text-gray-500">Minimum 6 characters</small>
                </div>

                <div>
                    <label for="securityConfirmPassword" class="block mb-1 text-sm font-medium text-gray-700">
                        Confirm New Password
                    </label>
                    <input type="password" id="securityConfirmPassword" placeholder="Confirm new password"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-gray-500">
                </div>

                <div class="flex gap-3 pt-4">
                    <button type="button" onclick="closeSecurityModal()"
                        class="flex-1 py-3 font-medium text-gray-700 border border-gray-300 rounded-lg hover:bg-gray-50">
                        Cancel
                    </button>
                    <button type="submit"
                        class="flex-1 py-3 font-medium text-white rounded-lg bg-zinc-900 hover:bg-zinc-800">
                        Update Security
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Crop Modal -->
    <div id="cropModal"
        class="fixed inset-0 z-50 flex items-center justify-center hidden p-4 bg-black/80 backdrop-blur-sm">
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
                <button onclick="closeCropModal()"
                    class="flex-1 py-2 font-medium text-gray-700 border border-gray-300 rounded-lg">
                    Cancel
                </button>
                <button onclick="cropImage()"
                    class="flex-1 py-2 font-medium text-white bg-gray-900 rounded-lg hover:bg-gray-800">
                    Crop & Save
                </button>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script src="{{ asset('main/js/cropper.min.js') }}"></script>
<script src="{{ asset('main/js/sweetalert2@11.js') }}"></script>
<script src="{{ asset('main/js/digital-card.js') }}"></script>
@endpush
