<header class="s-header sticky-header !top-0">

    <div class="container s-header__content !h-16 !max-w-7xl !px-5 md:!px-8 !rounded-none md:!rounded-b-lg !border-b !border-white/10 !bg-black/70 !backdrop-blur">

        <div class="s-header__block">

            <div class="header-logo !left-5 md:!left-8">
                <a class="logo" href="{{ route('home') }}">
                    <img class="!w-28 md:!w-32" src="{{ asset('frontend/images/logo.svg') }}" alt="Homepage">
                </a>
            </div>

            <a class="header-menu-toggle !right-5" href="#0">
                <span>Menu</span>
            </a>

        </div>

        <nav class="header-nav">

            <ul class="header-nav__links !gap-1 !px-3">

                <li>
                    <a href="{{ route('home') }}" class="!rounded-full !px-3 !py-2 !text-xs !font-semibold !uppercase !tracking-wide
        {{ request()->routeIs('home') ? '!bg-white !text-black' : 'hover:!bg-white/10 hover:!text-white' }}">
                        Intro
                    </a>
                </li>

                <li>
                    <a href="{{ route('about-us') }}" class="!rounded-full !px-3 !py-2 !text-xs !font-semibold !uppercase !tracking-wide
        {{ request()->routeIs('about-us') ? '!bg-white !text-black' : 'hover:!bg-white/10 hover:!text-white' }}">
                        About
                    </a>
                </li>

                <li>
                    <a href="#menu" class="!rounded-full !px-3 !py-2 !text-xs !font-semibold !uppercase !tracking-wide hover:!bg-white/10 hover:!text-white">
                        Menu
                    </a>
                </li>

                <li>
                    <a href="{{ route('gallery') }}" class="!rounded-full !px-3 !py-2 !text-xs !font-semibold !uppercase !tracking-wide
        {{ request()->routeIs('gallery') ? '!bg-white !text-black' : 'hover:!bg-white/10 hover:!text-white' }}">
                        Gallery
                    </a>
                </li>

                <li>
                    <a href="{{ route('contact') }}" class="!rounded-full !px-3 !py-2 !text-xs !font-semibold !uppercase !tracking-wide
        {{ request()->routeIs('contact') ? '!bg-white !text-black' : 'hover:!bg-white/10 hover:!text-white' }}">
                        Contact
                    </a>
                </li>

            </ul>

            <div class="header-contact !right-5 flex items-center gap-3">

                <!-- Subscribe Button -->
                <a href="{{route('subscription.index')}}" class="subscribe-btn">
                    ✨ Subscribe
                </a>

                <!-- Call Button -->
                <!-- <a href="tel:+123456789" class="header-contact__num btn !h-10 !rounded-full !px-5 !text-xs !font-bold !uppercase !tracking-wide !shadow-sm">
                    Call Us
                </a> -->

                @if(Auth::check())

                <div class="relative group">

                    <!-- Profile Button -->
                    <button class="flex items-center justify-center w-11 h-11 rounded-full bg-white/10 backdrop-blur-md border border-white/20 hover:bg-white/20 transition-all duration-300 hover:scale-105 overflow-hidden self-center">

                        @auth
                        @if(Auth::user()->img)
                        <img src="{{ Auth::user()->img ? asset('storage/' . Auth::user()->img) : 'https://ui-avatars.com/api/?name='.urlencode(Auth::user()->full_name ?? 'User').'&background=6366f1&color=fff&size=200' }}" alt="{{ Auth::user()->full_name }}" class="w-full h-full object-cover rounded-full" style="margin:auto;">
                        @else
                        <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->full_name ?? Auth::user()->first_name) }}&background=6366f1&color=fff&size=200" alt="{{ Auth::user()->full_name }}" class="w-full h-full object-cover rounded-full">
                        @endif
                        @else
                        <i class="fas fa-user text-white text-lg"></i>
                        @endauth

                    </button>

                    <!-- Dropdown -->
                    <div class="absolute right-0 mt-3 w-56 origin-top-right scale-95 opacity-0 invisible
               group-hover:opacity-100 group-hover:visible group-hover:scale-100
               transition-all duration-200 ease-out
               rounded-2xl border border-white/10 bg-black/90 backdrop-blur-xl
               shadow-2xl overflow-hidden z-50">

                        <!-- User Info -->
                        <div class="px-4 py-4 border-b border-white/10">
                            <p class="text-white font-semibold text-sm">
                                {{ Auth::user()->name ?? 'User' }}
                            </p>
                            <p class="text-gray-400 text-xs truncate">
                                {{ Auth::user()->email ?? '' }}
                            </p>
                        </div>

                        <!-- Profile -->
                        <a href="javascript:void(0)" onclick="openProfileModal()" class="flex items-center gap-3 px-4 py-3 text-sm text-gray-200 hover:bg-white/10 transition">

                            <i class="fas fa-user-circle text-indigo-400"></i>
                            <span>My Profile</span>

                        </a>

                        <!-- Dashboard (Optional) -->
                        <a href="javascript:void(0)" onclick="openAvatarModal()" class="flex items-center gap-3 px-4 py-3 text-sm text-gray-200 hover:bg-white/10 transition">
                            <i class="fas fa-image text-green-400"></i>
                            <span>Avatar</span>
                        </a>

                        <a href="javascript:void(0)" onclick="openPlanModal()" class="flex items-center gap-3 px-4 py-3 text-sm text-gray-200 hover:bg-white/10 transition">
                            <i class="fas fa-crown text-yellow-400"></i>
                            <span>My Plan</span>
                        </a>

                        <!-- Logout -->
                        <a href="{{ route('logout') }}" class="flex items-center gap-3 px-4 py-3 text-sm text-red-400 hover:bg-red-500/10 transition border-t border-white/10">
                            <i class="fas fa-right-from-bracket"></i>
                            <span>Logout</span>
                        </a>

                    </div>

                </div>

                @else

                <a href="{{ route('login') }}" class="inline-flex items-center px-5 py-2.5 rounded-full bg-gradient-to-r from-indigo-500 to-purple-600 text-white text-sm font-semibold hover:shadow-lg hover:scale-105 transition-all duration-300">
                    <i class="fas fa-sign-in-alt mr-2"></i>
                    Login
                </a>

                @endif

            </div>

        </nav>

    </div>

</header>


<!-- PROFILE MODAL -->
<div id="profileModal" class="fixed inset-0 z-50" style="display:none; align-items:center; justify-content:center;
            overflow-y:auto; padding:20px;
            background:rgba(0,0,0,0.6); backdrop-filter:blur(4px);">

    <div style="background:#fff; width:100%; max-width:700px; margin:auto;
                border-radius:20px; box-shadow:0 24px 60px rgba(0,0,0,0.25); overflow:hidden;">

        <!-- Header -->
        <div style="height:130px; background:linear-gradient(135deg,#4f46e5,#7c3aed,#ec4899); position:relative;">
            <button onclick="closeProfileModal()" style="position:absolute; top:14px; right:14px; width:32px; height:32px;
                           border-radius:50%; border:none; background:rgba(255,255,255,0.2);
                           color:#fff; cursor:pointer; font-size:16px; display:flex;
                           align-items:center; justify-content:center;">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <!-- Avatar -->
        <div style="display:flex; justify-content:center; margin-top:-48px; margin-bottom:8px;">
            <div style="position:relative; display:inline-block;">

                @auth
                <img id="profileImgPreview" 
     src="{{ Auth::user()->img 
          ? asset('storage/' . Auth::user()->img) 
          : 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->full_name ?? Auth::user()->first_name . ' ' . Auth::user()->last_name ?? 'User') . '&background=6366f1&color=fff&size=200' 
     }}" 
     style="width:96px; height:96px; border-radius:50%; border:4px solid #fff;
            object-fit:cover; box-shadow:0 8px 20px rgba(0,0,0,0.15);"
     onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->full_name ?? 'User') }}&background=6366f1&color=fff&size=200'">
                @else
                <img id="profileImgPreview" src="https://ui-avatars.com/api/?name=User&background=6366f1&color=fff&size=200" style="width:96px; height:96px; border-radius:50%; border:4px solid #fff;
           object-fit:cover; box-shadow:0 8px 20px rgba(0,0,0,0.15);">
                @endauth
                <!-- Hidden file input -->
                <input type="file" id="imgInput" accept="image/*" style="display:none" onchange="previewImage(event)">
                <button onclick="document.getElementById('imgInput').click()" style="position:absolute; bottom:2px; right:2px; width:28px; height:28px;
                               border-radius:50%; background:#4f46e5; border:none; cursor:pointer;
                               display:flex; align-items:center; justify-content:center; color:#fff;">
                    <i class="fas fa-camera" style="font-size:12px;"></i>
                </button>
            </div>
        </div>

        <!-- Title -->
        <div style="text-align:center; margin-bottom:20px;">
            <h2 style="font-size:20px; font-weight:700; color:#111827; margin:0;">My Profile</h2>
            <p style="font-size:13px; color:#9ca3af; margin:4px 0 0;">Manage your personal information</p>
        </div>

        <!-- Alert (success/error) -->
        <div id="profileAlert" style="display:none; margin:0 28px 16px; padding:12px 16px;
             border-radius:10px; font-size:13px; font-weight:500;"></div>

        <!-- Fields -->
        @auth
        <div style="padding:0 28px 24px; display:grid; grid-template-columns:1fr 1fr; gap:14px;">

            <!-- First Name -->
            <div>
                <label class="profile-label">First Name</label>
                <div class="profile-field-wrap">
                    <input id="firstName" name="first_name" value="{{ Auth::user()->first_name }}" disabled class="profile-input">
                    <button onclick="enableEdit('firstName')" class="edit-btn">
                        <i class="fas fa-pen"></i>
                    </button>
                </div>
            </div>

            <!-- Last Name -->
            <div>
                <label class="profile-label">Last Name</label>
                <div class="profile-field-wrap">
                    <input id="lastName" name="last_name" value="{{ Auth::user()->last_name }}" disabled class="profile-input">
                    <button onclick="enableEdit('lastName')" class="edit-btn">
                        <i class="fas fa-pen"></i>
                    </button>
                </div>
            </div>

            <!-- Email -->
            <div>
                <label class="profile-label">Email</label>
                <div class="profile-field-wrap">
                    <input id="profileEmail" name="email" value="{{ Auth::user()->email }}" disabled class="profile-input">
                    <button onclick="enableEdit('profileEmail')" class="edit-btn">
                        <i class="fas fa-pen"></i>
                    </button>
                </div>
            </div>

            <!-- User Type -->
            <div>
                <label class="profile-label">User Type</label>
                <div class="profile-field-wrap" style="position:relative;">
                    <select id="userType" name="user_type" class="profile-input" disabled style="padding:0 42px 0 14px; cursor:default; appearance:none; -webkit-appearance:none;" onchange="document.getElementById('saveBtn').style.display='block'">
                        <option value="">Choose your role</option>
                        <option value="doctor" {{ Auth::user()->user_type == 'doctor'           ? 'selected' : '' }}>Doctor</option>
                        <option value="nurse" {{ Auth::user()->user_type == 'nurse'            ? 'selected' : '' }}>Nurse</option>
                        <option value="pharmacist" {{ Auth::user()->user_type == 'pharmacist'       ? 'selected' : '' }}>Pharmacist</option>
                        <option value="lab_technician" {{ Auth::user()->user_type == 'lab_technician'   ? 'selected' : '' }}>Lab Technician</option>
                        <option value="medical_student" {{ Auth::user()->user_type == 'medical_student'  ? 'selected' : '' }}>Medical Student</option>
                        <option value="healthcare_worker" {{ Auth::user()->user_type == 'healthcare_worker'? 'selected' : '' }}>Healthcare Worker</option>
                        <option value="hospital_admin" {{ Auth::user()->user_type == 'hospital_admin'   ? 'selected' : '' }}>Hospital Admin</option>
                        <option value="clinic_owner" {{ Auth::user()->user_type == 'clinic_owner'     ? 'selected' : '' }}>Clinic Owner</option>
                        <option value="other" {{ Auth::user()->user_type == 'other'            ? 'selected' : '' }}>Other</option>
                    </select>
                    <button type="button" onclick="enableEditSelect()" class="edit-btn">
                        <i class="fas fa-pen"></i>
                    </button>
                </div>
            </div>

            <!-- Mobile (locked) -->
            <div>
                <label class="profile-label">Mobile Number</label>
                <input value="{{ Auth::user()->country_code }} {{ Auth::user()->mobile_number }}" disabled class="profile-input profile-input--locked">
            </div>

            <!-- Member Since (locked) -->
            <div>
                <label class="profile-label">Member Since</label>
                <input value="{{ Auth::user()->created_at->format('d M Y') }}" disabled class="profile-input profile-input--locked">
            </div>

            <!-- Premium badge row (full width) -->
            @if(Auth::user()->is_premium)
            <div style="grid-column:1/-1;">
                <label class="profile-label">Premium Status</label>
                <div style="display:flex; align-items:center; gap:10px; height:46px;
                    border:1px solid #e5e7eb; border-radius:10px; padding:0 14px;
                    background:#fefce8;">
                    <span style="font-size:13px; color:#854d0e; font-weight:600;">
                        ✨ Premium — expires {{ \Carbon\Carbon::parse(Auth::user()->premium_expiry_date)->format('d M Y') }}
                    </span>
                </div>
            </div>
            @endif

        </div>
        @endauth

        <!-- Footer -->
        <div style="display:flex; justify-content:flex-end; gap:10px; padding:0 28px 24px;">
            <button onclick="closeProfileModal()" class="btn-modal-cancel">Cancel</button>
            <button id="saveBtn" onclick="saveProfile()" class="btn-modal-save" style="display:none;">
                <span id="saveBtnText">Save Changes</span>
            </button>
        </div>

    </div>
</div>

<style>
    .profile-label {
        display: block;
        font-size: 11px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.06em;
        color: #9ca3af;
        margin-bottom: 6px;
    }

    .profile-field-wrap {
        position: relative;
    }

    .profile-input {
        width: 100%;
        height: 46px;
        border: 1px solid #e5e7eb;
        border-radius: 10px;
        padding: 0 42px 0 14px;
        background: #f9fafb;
        color: #111827;
        font-size: 14px;
        box-sizing: border-box;
        transition: all .2s;
        outline: none;
        font-family: inherit;
    }

    .profile-input:not(:disabled) {
        border-color: #6366f1;
        background: #fff;
        box-shadow: 0 0 0 3px rgba(99, 102, 241, .12);
    }

    .profile-input--locked {
        background: #f3f4f6 !important;
        color: #9ca3af !important;
        cursor: not-allowed !important;
        padding: 0 14px !important;
    }

    .edit-btn {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        width: 26px;
        height: 26px;
        border: none;
        background: transparent;
        color: #d1d5db;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 6px;
        font-size: 12px;
        transition: .2s;
    }

    .edit-btn:hover {
        color: #4f46e5;
        background: #eef2ff;
    }

    .btn-modal-cancel {
        padding: 10px 20px;
        border-radius: 10px;
        border: 1px solid #e5e7eb;
        background: transparent;
        color: #6b7280;
        font-size: 13px;
        cursor: pointer;
        font-family: inherit;
        transition: .2s;
    }

    .btn-modal-cancel:hover {
        background: #f9fafb;
    }

    .btn-modal-save {
        padding: 10px 22px;
        border-radius: 10px;
        border: none;
        background: #4f46e5;
        color: #fff;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        font-family: inherit;
        box-shadow: 0 4px 12px rgba(79, 70, 229, .3);
        transition: .2s;
    }

    .btn-modal-save:hover {
        background: #4338ca;
    }

    .btn-modal-save:disabled {
        opacity: .6;
        cursor: not-allowed;
    }
</style>

<script>
    function enableEditSelect() {
        const sel = document.getElementById('userType');
        sel.disabled = false;
        sel.style.cursor = 'pointer';
        sel.style.borderColor = '#6366f1';
        sel.style.boxShadow = '0 0 0 3px rgba(99,102,241,.12)';
        sel.style.background = '#fff';
        // swap pen for chevron once unlocked
        const btn = sel.nextElementSibling;
        btn.innerHTML = '<i class="fas fa-chevron-down" style="font-size:11px;"></i>';
        btn.style.pointerEvents = 'none';
        document.getElementById('saveBtn').style.display = 'block';
    }

    function openProfileModal() {
        document.getElementById('profileModal').style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }

    function closeProfileModal() {
        document.getElementById('profileModal').style.display = 'none';
        document.body.style.overflow = '';
    }

    function enableEdit(id) {
        document.getElementById(id).disabled = false;
        document.getElementById(id).focus();
        document.getElementById('saveBtn').style.display = 'block';
    }

    function previewImage(event) {
        const file = event.target.files[0];
        if (!file) return;
        const reader = new FileReader();
        reader.onload = e => {
            document.getElementById('profileImgPreview').src = e.target.result;
        };
        reader.readAsDataURL(file);
        document.getElementById('saveBtn').style.display = 'block';
    }

    function showAlert(msg, type) {
        const el = document.getElementById('profileAlert');
        el.textContent = msg;
        el.style.display = 'block';
        if (type === 'success') {
            el.style.background = '#f0fdf4';
            el.style.color = '#166534';
            el.style.border = '1px solid #bbf7d0';
        } else {
            el.style.background = '#fef2f2';
            el.style.color = '#991b1b';
            el.style.border = '1px solid #fecaca';
        }
        setTimeout(() => el.style.display = 'none', 4000);
    }
    async function saveProfile() {
        const btn = document.getElementById('saveBtn');
        const btnText = document.getElementById('saveBtnText');
        btn.disabled = true;
        btnText.textContent = 'Saving...';

        const formData = new FormData();
        formData.append('_token', '{{ csrf_token() }}');
        formData.append('first_name', document.getElementById('firstName').value);
        formData.append('last_name', document.getElementById('lastName').value);
        formData.append('email', document.getElementById('profileEmail').value);
        formData.append('user_type', document.getElementById('userType').value);

        const imgFile = document.getElementById('imgInput').files[0];
        if (imgFile) formData.append('img', imgFile);

        try {
            const res = await fetch('{{ route("profile.update") }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });
            const data = await res.json();
            if (data.success) {
                showAlert('Profile updated successfully!', 'success');
                btn.style.display = 'none';
            } else {
                const errors = Object.values(data.errors ?? {}).flat().join(' ');
                showAlert(errors || 'Something went wrong.', 'error');
            }
        } catch (e) {
            showAlert('Network error. Please try again.', 'error');
        } finally {
            btn.disabled = false;
            btnText.textContent = 'Save Changes';
        }
    }
</script>
<!-- profile image + selfie -->

<!-- AVATAR MODAL -->
<div id="avatarModal" class="fixed inset-0 z-[999]" style="display:none; align-items:center; justify-content:center;
            background:rgba(0,0,0,0.7); backdrop-filter:blur(6px); padding:20px; overflow-y:auto;">

    <div style="background:#fff; width:100%; max-width:580px; margin:auto;
                border-radius:24px; box-shadow:0 32px 80px rgba(0,0,0,0.3); overflow:hidden;">

        <!-- Header -->
        <div style="background:linear-gradient(135deg,#4f46e5,#7c3aed,#ec4899);
                    padding:24px 28px 20px; position:relative;">
            <h2 style="color:#fff; font-size:18px; font-weight:700; margin:0;">Update Avatar</h2>
            <p style="color:rgba(255,255,255,0.75); font-size:13px; margin:4px 0 0;">
                Upload a photo or take a selfie
            </p>
            <button onclick="closeAvatarModal()" style="position:absolute; top:18px; right:18px; width:32px; height:32px;
                           border-radius:50%; border:none; background:rgba(255,255,255,0.2);
                           color:#fff; cursor:pointer; font-size:15px; display:flex;
                           align-items:center; justify-content:center;">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <!-- Tabs -->
        <div style="display:flex; border-bottom:1px solid #f3f4f6; background:#fafafa;">
            <button id="tabUpload" onclick="switchTab('upload')" style="flex:1; padding:14px; font-size:13px; font-weight:600; border:none;
                           background:transparent; cursor:pointer; border-bottom:2px solid #4f46e5;
                           color:#4f46e5; transition:.2s;">
                <i class="fas fa-upload" style="margin-right:7px;"></i> Browse & Upload
            </button>
            <button id="tabSelfie" onclick="switchTab('selfie')" style="flex:1; padding:14px; font-size:13px; font-weight:600; border:none;
                           background:transparent; cursor:pointer; border-bottom:2px solid transparent;
                           color:#9ca3af; transition:.2s;">
                <i class="fas fa-camera" style="margin-right:7px;"></i> Take Selfie
            </button>
        </div>

        <!-- UPLOAD SECTION -->
        <div id="sectionUpload" style="padding:28px;">

            <!-- Drop Zone -->
            <div id="dropZone" onclick="document.getElementById('avatarFileInput').click()" ondragover="event.preventDefault(); this.style.borderColor='#4f46e5'; this.style.background='#eef2ff';" ondragleave="this.style.borderColor='#e5e7eb'; this.style.background='#fafafa';" ondrop="handleDrop(event)" style="border:2px dashed #e5e7eb; border-radius:16px; background:#fafafa;
                        padding:36px 20px; text-align:center; cursor:pointer; transition:.2s;">
                <div id="dropZoneContent">
                    <div style="width:56px; height:56px; border-radius:50%; background:#eef2ff;
                                display:flex; align-items:center; justify-content:center; margin:0 auto 12px;">
                        <i class="fas fa-cloud-upload-alt" style="font-size:22px; color:#4f46e5;"></i>
                    </div>
                    <p style="font-size:14px; font-weight:600; color:#111827; margin:0 0 4px;">
                        Click to browse or drag & drop
                    </p>
                    <p style="font-size:12px; color:#9ca3af; margin:0;">
                        JPG, PNG, WEBP — max 2MB
                    </p>
                </div>
                <input type="file" id="avatarFileInput" accept="image/*" style="display:none" onchange="handleFileSelect(event)">
            </div>

            <!-- Preview -->
            <div id="uploadPreviewWrap" style="display:none; margin-top:20px; text-align:center;">
                <div style="position:relative; display:inline-block;">
                    <img id="uploadPreviewImg" style="width:120px; height:120px; border-radius:50%; object-fit:cover;
                                border:4px solid #4f46e5; box-shadow:0 8px 24px rgba(79,70,229,.25);">
                    <button onclick="clearUploadPreview()" style="position:absolute; top:4px; right:4px; width:26px; height:26px;
                                   border-radius:50%; background:#ef4444; border:none; color:#fff;
                                   cursor:pointer; font-size:11px; display:flex;
                                   align-items:center; justify-content:center;">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <p style="font-size:12px; color:#6b7280; margin:10px 0 0;" id="uploadFileName"></p>
            </div>

            <!-- Upload Alert -->
            <div id="uploadAlert" style="display:none; margin-top:16px; padding:12px 16px;
                 border-radius:10px; font-size:13px; font-weight:500;"></div>

            <!-- Upload Button -->
            <div style="display:flex; justify-content:flex-end; gap:10px; margin-top:24px;">
                <button onclick="closeAvatarModal()" style="padding:11px 20px; border-radius:10px; border:1px solid #e5e7eb;
                               background:transparent; color:#6b7280; font-size:13px; cursor:pointer;
                               font-family:inherit;">
                    Cancel
                </button>
                <button id="uploadSaveBtn" onclick="submitUpload()" style="padding:11px 24px; border-radius:10px; border:none;
                               background:#4f46e5; color:#fff; font-size:13px; font-weight:600;
                               cursor:pointer; font-family:inherit;
                               box-shadow:0 4px 12px rgba(79,70,229,.3);">
                    <i class="fas fa-check" style="margin-right:6px;"></i>
                    <span id="uploadSaveBtnText">Save Avatar</span>
                </button>
            </div>
        </div>

        <!-- SELFIE SECTION -->
        <div id="sectionSelfie" style="display:none; padding:28px;">

            <!-- Camera View -->
            <div style="position:relative; border-radius:16px; overflow:hidden;
                        background:#000; aspect-ratio:4/3;">
                <video id="selfieVideo" autoplay playsinline muted style="width:100%; height:100%; object-fit:cover; display:block;"></video>
                <canvas id="selfieCanvas" style="display:none;"></canvas>

                <!-- Overlay guide ring -->
                <div style="position:absolute; inset:0; display:flex; align-items:center;
                            justify-content:center; pointer-events:none;">
                    <div style="width:180px; height:180px; border-radius:50%;
                                border:2px dashed rgba(255,255,255,0.4);"></div>
                </div>

                <!-- Frozen preview -->
                <img id="selfiePreviewImg" style="display:none; width:100%; height:100%;
                     object-fit:cover; position:absolute; inset:0;">
            </div>

            <!-- Camera status -->
            <div id="cameraStatus" style="text-align:center; margin-top:12px;
                 font-size:13px; color:#9ca3af;">
                <i class="fas fa-circle-notch fa-spin" style="margin-right:6px;"></i>
                Starting camera...
            </div>

            <!-- Selfie Alert -->
            <div id="selfieAlert" style="display:none; margin-top:12px; padding:12px 16px;
                 border-radius:10px; font-size:13px; font-weight:500;"></div>

            <!-- Selfie Controls -->
            <div style="display:flex; justify-content:center; align-items:center;
                        gap:14px; margin-top:20px; flex-wrap:wrap;">

                <!-- Retake -->
                <button id="retakeBtn" onclick="retakeSelfie()" style="display:none;
                        padding:11px 20px; border-radius:10px; border:1px solid #e5e7eb;
                        background:transparent; color:#6b7280; font-size:13px; cursor:pointer;
                        font-family:inherit;">
                    <i class="fas fa-redo" style="margin-right:6px;"></i> Retake
                </button>

                <!-- Capture -->
                <button id="captureBtn" onclick="captureSelfie()" style="width:62px; height:62px; border-radius:50%; border:4px solid #fff;
                               background:#4f46e5; color:#fff; font-size:20px; cursor:pointer;
                               box-shadow:0 4px 16px rgba(79,70,229,.4); transition:.2s;">
                    <i class="fas fa-camera"></i>
                </button>

                <!-- Save Selfie -->
                <button id="selfieSaveBtn" onclick="submitSelfie()" style="display:none;
                        padding:11px 24px; border-radius:10px; border:none; background:#4f46e5;
                        color:#fff; font-size:13px; font-weight:600; cursor:pointer;
                        font-family:inherit; box-shadow:0 4px 12px rgba(79,70,229,.3);">
                    <i class="fas fa-check" style="margin-right:6px;"></i>
                    <span id="selfieSaveBtnText">Use This Photo</span>
                </button>

            </div>
        </div>

    </div>
</div>

<style>
    #avatarModal * {
        box-sizing: border-box;
    }
</style>

<script>
    let cameraStream = null;
    let selfieBlob = null;
    let uploadFile = null;

    /* ── Modal open/close ── */
    function openAvatarModal() {
        document.getElementById('avatarModal').style.display = 'flex';
        document.body.style.overflow = 'hidden';
        switchTab('upload');
    }

    function closeAvatarModal() {
        document.getElementById('avatarModal').style.display = 'none';
        document.body.style.overflow = '';
        stopCamera();
        clearUploadPreview();
        clearSelfiePreview();
    }

    /* ── Tabs ── */
    function switchTab(tab) {
        const isUpload = tab === 'upload';
        document.getElementById('sectionUpload').style.display = isUpload ? 'block' : 'none';
        document.getElementById('sectionSelfie').style.display = isUpload ? 'none' : 'block';

        const tU = document.getElementById('tabUpload');
        const tS = document.getElementById('tabSelfie');
        tU.style.borderBottomColor = isUpload ? '#4f46e5' : 'transparent';
        tU.style.color = isUpload ? '#4f46e5' : '#9ca3af';
        tS.style.borderBottomColor = isUpload ? 'transparent' : '#4f46e5';
        tS.style.color = isUpload ? '#9ca3af' : '#4f46e5';

        if (!isUpload) startCamera();
        else stopCamera();
    }

    /* ── Upload Tab ── */
    function handleDrop(e) {
        e.preventDefault();
        document.getElementById('dropZone').style.borderColor = '#e5e7eb';
        document.getElementById('dropZone').style.background = '#fafafa';
        const file = e.dataTransfer.files[0];
        if (file) processFile(file);
    }

    function handleFileSelect(e) {
        const file = e.target.files[0];
        if (file) processFile(file);
    }

    function processFile(file) {
        if (file.size > 2 * 1024 * 1024) {
            showAlert('uploadAlert', 'File too large. Max 2MB allowed.', 'error');
            return;
        }
        uploadFile = file;
        const reader = new FileReader();
        reader.onload = e => {
            document.getElementById('uploadPreviewImg').src = e.target.result;
            document.getElementById('uploadFileName').textContent = file.name;
            document.getElementById('uploadPreviewWrap').style.display = 'block';
            document.getElementById('dropZoneContent').style.opacity = '0.4';
        };
        reader.readAsDataURL(file);
    }

    function clearUploadPreview() {
        uploadFile = null;
        document.getElementById('uploadPreviewWrap').style.display = 'none';
        document.getElementById('dropZoneContent').style.opacity = '1';
        document.getElementById('avatarFileInput').value = '';
        document.getElementById('uploadAlert').style.display = 'none';
    }

    /* ── Camera / Selfie Tab ── */
    async function startCamera() {
        document.getElementById('cameraStatus').innerHTML =
            '<i class="fas fa-circle-notch fa-spin" style="margin-right:6px;"></i>Starting camera...';
        try {
            cameraStream = await navigator.mediaDevices.getUserMedia({
                video: {
                    facingMode: 'user',
                    width: {
                        ideal: 1280
                    },
                    height: {
                        ideal: 960
                    }
                },
                audio: false
            });
            const video = document.getElementById('selfieVideo');
            video.srcObject = cameraStream;
            video.style.display = 'block';
            document.getElementById('cameraStatus').textContent = 'Position your face in the circle';
        } catch (err) {
            document.getElementById('cameraStatus').innerHTML =
                '<i class="fas fa-exclamation-triangle" style="color:#ef4444; margin-right:6px;"></i>Camera access denied. Please allow camera permission.';
        }
    }

    function stopCamera() {
        if (cameraStream) {
            cameraStream.getTracks().forEach(t => t.stop());
            cameraStream = null;
        }
    }

    function captureSelfie() {
        const video = document.getElementById('selfieVideo');
        const canvas = document.getElementById('selfieCanvas');
        canvas.width = video.videoWidth || 640;
        canvas.height = video.videoHeight || 480;
        canvas.getContext('2d').drawImage(video, 0, 0);

        canvas.toBlob(blob => {
            selfieBlob = blob;
            const url = URL.createObjectURL(blob);
            const prev = document.getElementById('selfiePreviewImg');
            prev.src = url;
            prev.style.display = 'block';
            video.style.display = 'none';
            stopCamera();

            document.getElementById('captureBtn').style.display = 'none';
            document.getElementById('retakeBtn').style.display = 'inline-flex';
            document.getElementById('selfieSaveBtn').style.display = 'inline-flex';
            document.getElementById('cameraStatus').textContent = 'Looking good! Save or retake.';
        }, 'image/jpeg', 0.92);
    }

    function retakeSelfie() {
        clearSelfiePreview();
        startCamera();
    }

    function clearSelfiePreview() {
        selfieBlob = null;
        const prev = document.getElementById('selfiePreviewImg');
        prev.style.display = 'none';
        prev.src = '';
        document.getElementById('selfieVideo').style.display = 'block';
        document.getElementById('captureBtn').style.display = 'flex';
        document.getElementById('retakeBtn').style.display = 'none';
        document.getElementById('selfieSaveBtn').style.display = 'none';
        document.getElementById('selfieAlert').style.display = 'none';
    }

    /* ── Submit ── */
    async function submitUpload() {
        if (!uploadFile) {
            showAlert('uploadAlert', 'Please select an image first.', 'error');
            return;
        }
        const fd = new FormData();
        fd.append('_token', '{{ csrf_token() }}');
        fd.append('img', uploadFile);
        await doAvatarSave(fd, 'uploadSaveBtn', 'uploadSaveBtnText', 'uploadAlert');
    }
    async function submitSelfie() {
        if (!selfieBlob) return;
        const fd = new FormData();
        fd.append('_token', '{{ csrf_token() }}');
        fd.append('img', selfieBlob, 'selfie.jpg');
        await doAvatarSave(fd, 'selfieSaveBtn', 'selfieSaveBtnText', 'selfieAlert');
    }
    async function doAvatarSave(fd, btnId, textId, alertId) {
        const btn = document.getElementById(btnId);
        const text = document.getElementById(textId);
        btn.disabled = true;
        text.textContent = 'Saving...';
        try {
            const res = await fetch('{{ route("avatar.update") }}', {
                method: 'POST',
                body: fd,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });
            const data = await res.json();
            if (data.success) {
                showAlert(alertId, 'Avatar updated successfully!', 'success');
                // Update all avatar images on the page
                document.querySelectorAll('#profileImgPreview, .user-avatar-img').forEach(el => {
                    el.src = data.img_url + '?t=' + Date.now();
                });
                setTimeout(closeAvatarModal, 1500);
            } else {
                showAlert(alertId, data.message || 'Something went wrong.', 'error');
            }
        } catch (e) {
            showAlert(alertId, 'Network error. Please try again.', 'error');
        } finally {
            btn.disabled = false;
            text.textContent = btnId === 'uploadSaveBtn' ? 'Save Avatar' : 'Use This Photo';
        }
    }

    /* ── Alert helper ── */
    function showAlert(id, msg, type) {
        const el = document.getElementById(id);
        el.textContent = msg;
        el.style.display = 'block';
        if (type === 'success') {
            el.style.background = '#f0fdf4';
            el.style.color = '#166534';
            el.style.border = '1px solid #bbf7d0';
        } else {
            el.style.background = '#fef2f2';
            el.style.color = '#991b1b';
            el.style.border = '1px solid #fecaca';
        }
    }
</script>

<!-- current plan  -->

<!-- PLAN MODAL -->
<div id="planModal" class="fixed inset-0 z-[999]" style="display:none; align-items:center; justify-content:center;
            background:rgba(0,0,0,0.7); backdrop-filter:blur(6px);
            padding:20px; overflow-y:auto;">

    <div style="background:#fff; width:100%; max-width:540px; margin:auto;
                border-radius:24px; box-shadow:0 32px 80px rgba(0,0,0,0.3); overflow:hidden;">

        @php
        $user = Auth::check() ? Auth::user() : null;
        $sub = $user ? \App\Models\Subscription::where('user_id', $user->id)
        ->where('status', 'paid')
        ->latest()
        ->first() : null;
        $isActive = $sub && \Carbon\Carbon::parse($sub->expiry_date)->isFuture();
        $planName = $sub->plan_name ?? '';
        $planLabel = $planName == '1_month' ? '1 Month' :
        ($planName == '3_month' ? '3 Months' :
        ($planName == '6_month' ? '6 Months' :
        ucfirst(str_replace('_', ' ', $planName ?: 'N/A'))));
        $daysLeft = $sub ? \Carbon\Carbon::now()->diffInDays(\Carbon\Carbon::parse($sub->expiry_date)) : 0;
        $totalDays = $sub ? \Carbon\Carbon::parse($sub->start_date)->diffInDays(\Carbon\Carbon::parse($sub->expiry_date)) : 1;
        $progress = $sub ? round((($totalDays - $daysLeft) / $totalDays) * 100) : 0;
        @endphp

        <!-- Header -->
        <div style="background:linear-gradient(135deg,#f59e0b,#d97706,#b45309);
                    padding:28px; position:relative; text-align:center;">

            <button onclick="closePlanModal()" style="position:absolute; top:16px; right:16px; width:32px; height:32px;
                           border-radius:50%; border:none; background:rgba(255,255,255,0.2);
                           color:#fff; cursor:pointer; font-size:15px; display:flex;
                           align-items:center; justify-content:center;">
                <i class="fas fa-times"></i>
            </button>

            <div style="width:68px; height:68px; border-radius:50%;
                        background:rgba(255,255,255,0.2); border:2px solid rgba(255,255,255,0.4);
                        display:flex; align-items:center; justify-content:center; margin:0 auto 14px;">
                <i class="fas fa-crown" style="font-size:28px; color:#fff;"></i>
            </div>

            <h2 style="color:#fff; font-size:20px; font-weight:700; margin:0 0 4px;">
                My Subscription
            </h2>
            <p style="color:rgba(255,255,255,0.8); font-size:13px; margin:0;">
                Your current plan & billing details
            </p>

        </div>

        <div style="padding:28px;">

            @if($isActive && $sub)

            <!-- Status Badge -->
            <div style="text-align:center; margin-bottom:22px;">
                <span style="display:inline-flex; align-items:center; gap:7px;
                                 background:#f0fdf4; color:#166534; border:1px solid #bbf7d0;
                                 padding:7px 18px; border-radius:999px; font-size:13px; font-weight:600;">
                    <span style="width:8px; height:8px; border-radius:50%; background:#22c55e;
                                     display:inline-block; animation:pulse-green 1.5s infinite;"></span>
                    Active Subscription
                </span>
            </div>

            <!-- Plan name card -->
            <div style="background:linear-gradient(135deg,#fffbeb,#fef3c7);
                            border:1px solid #fde68a; border-radius:16px;
                            padding:18px 22px; margin-bottom:16px;
                            display:flex; justify-content:space-between; align-items:center;">
                <div>
                    <p style="font-size:11px; font-weight:600; text-transform:uppercase;
                                  letter-spacing:.07em; color:#92400e; margin:0 0 5px;">Current Plan</p>
                    <p style="font-size:24px; font-weight:700; color:#78350f; margin:0;">
                        {{ $planLabel }}
                    </p>
                    <p style="font-size:12px; color:#a16207; margin:4px 0 0;">
                        ₹{{ number_format($sub->amount, 2) }} one-time payment
                    </p>
                </div>
                <div style="width:54px; height:54px; border-radius:14px; background:#f59e0b;
                                display:flex; align-items:center; justify-content:center;
                                box-shadow:0 4px 12px rgba(245,158,11,.4);">
                    <i class="fas fa-star" style="font-size:22px; color:#fff;"></i>
                </div>
            </div>

            <!-- Progress bar -->
            <div style="background:#f9fafb; border:1px solid #f3f4f6;
                            border-radius:12px; padding:16px 18px; margin-bottom:16px;">
                <div style="display:flex; justify-content:space-between; margin-bottom:8px;">
                    <span style="font-size:12px; font-weight:600; color:#6b7280;">Plan Usage</span>
                    <span style="font-size:12px; font-weight:700; color:#111827;">
                        {{ $daysLeft }} days remaining
                    </span>
                </div>
                <div style="height:8px; background:#e5e7eb; border-radius:999px; overflow:hidden;">
                    <div style="height:100%; width:{{ $progress }}%;
                                    background:linear-gradient(90deg,#f59e0b,#d97706);
                                    border-radius:999px; transition:.3s;"></div>
                </div>
                <div style="display:flex; justify-content:space-between; margin-top:6px;">
                    <span style="font-size:11px; color:#9ca3af;">
                        Started {{ \Carbon\Carbon::parse($sub->start_date)->format('d M Y') }}
                    </span>
                    <span style="font-size:11px; color:#9ca3af;">
                        Ends {{ \Carbon\Carbon::parse($sub->expiry_date)->format('d M Y') }}
                    </span>
                </div>
            </div>

            <!-- Details grid -->
            <div style="display:grid; grid-template-columns:1fr 1fr; gap:10px; margin-bottom:16px;">

                <div style="background:#f9fafb; border:1px solid #f3f4f6;
                                border-radius:12px; padding:14px 16px;">
                    <p style="font-size:11px; font-weight:600; text-transform:uppercase;
                                  letter-spacing:.06em; color:#9ca3af; margin:0 0 5px;">
                        <i class="fas fa-calendar-check" style="margin-right:4px; color:#22c55e;"></i>
                        Start Date
                    </p>
                    <p style="font-size:15px; font-weight:700; color:#111827; margin:0;">
                        {{ \Carbon\Carbon::parse($sub->start_date)->format('d M Y') }}
                    </p>
                </div>

                <div style="background:#fef2f2; border:1px solid #fecaca;
                                border-radius:12px; padding:14px 16px;">
                    <p style="font-size:11px; font-weight:600; text-transform:uppercase;
                                  letter-spacing:.06em; color:#f87171; margin:0 0 5px;">
                        <i class="fas fa-calendar-xmark" style="margin-right:4px;"></i>
                        Expiry Date
                    </p>
                    <p style="font-size:15px; font-weight:700; color:#991b1b; margin:0;">
                        {{ \Carbon\Carbon::parse($sub->expiry_date)->format('d M Y') }}
                    </p>
                </div>

                <div style="background:#f0f9ff; border:1px solid #bae6fd;
                                border-radius:12px; padding:14px 16px;">
                    <p style="font-size:11px; font-weight:600; text-transform:uppercase;
                                  letter-spacing:.06em; color:#38bdf8; margin:0 0 5px;">
                        <i class="fas fa-clock" style="margin-right:4px;"></i>
                        Days Left
                    </p>
                    <p style="font-size:17px; font-weight:700; color:#0369a1; margin:0;">
                        {{ $daysLeft }} days
                    </p>
                </div>

                <div style="background:#f5f3ff; border:1px solid #ddd6fe;
                                border-radius:12px; padding:14px 16px;">
                    <p style="font-size:11px; font-weight:600; text-transform:uppercase;
                                  letter-spacing:.06em; color:#a78bfa; margin:0 0 5px;">
                        <i class="fas fa-indian-rupee-sign" style="margin-right:4px;"></i>
                        Amount Paid
                    </p>
                    <p style="font-size:17px; font-weight:700; color:#5b21b6; margin:0;">
                        ₹{{ number_format($sub->amount, 2) }}
                    </p>
                </div>

            </div>

            <!-- Payment details -->
            <div style="background:#f9fafb; border:1px solid #f3f4f6;
                            border-radius:12px; padding:16px 18px; margin-bottom:24px;">

                <p style="font-size:12px; font-weight:700; text-transform:uppercase;
                              letter-spacing:.06em; color:#6b7280; margin:0 0 12px;
                              border-bottom:1px solid #f3f4f6; padding-bottom:10px;">
                    <i class="fas fa-receipt" style="margin-right:6px; color:#f59e0b;"></i>
                    Payment Details
                </p>

                <div style="display:flex; flex-direction:column; gap:8px;">

                    <div style="display:flex; justify-content:space-between; align-items:center;">
                        <span style="font-size:12px; color:#9ca3af; font-weight:500;">Payment ID</span>
                        <span style="font-size:12px; color:#374151; font-weight:600;
                                         font-family:monospace; background:#f3f4f6;
                                         padding:3px 8px; border-radius:6px;">
                            {{ $sub->razorpay_payment_id }}
                        </span>
                    </div>

                    <div style="display:flex; justify-content:space-between; align-items:center;">
                        <span style="font-size:12px; color:#9ca3af; font-weight:500;">Subscription ID</span>
                        <span style="font-size:12px; color:#374151; font-weight:600;
                                         font-family:monospace; background:#f3f4f6;
                                         padding:3px 8px; border-radius:6px;">
                            {{ $sub->razorpay_subscription_id }}
                        </span>
                    </div>

                    <div style="display:flex; justify-content:space-between; align-items:center;">
                        <span style="font-size:12px; color:#9ca3af; font-weight:500;">Status</span>
                        <span style="font-size:12px; font-weight:700; color:#166534;
                                         background:#dcfce7; padding:3px 10px; border-radius:999px;">
                            ✓ PAID
                        </span>
                    </div>

                    <div style="display:flex; justify-content:space-between; align-items:center;">
                        <span style="font-size:12px; color:#9ca3af; font-weight:500;">Subscribed On</span>
                        <span style="font-size:12px; color:#374151; font-weight:600;">
                            {{ \Carbon\Carbon::parse($sub->created_at)->format('d M Y, h:i A') }}
                        </span>
                    </div>

                </div>
            </div>

            <!-- Buttons -->
            <div style="display:flex; gap:10px;">
                <button onclick="closePlanModal()" style="flex:1; padding:13px; border-radius:10px;
                                   border:1px solid #e5e7eb; background:transparent;
                                   color:#6b7280; font-size:13px; cursor:pointer; font-family:inherit;">
                    Close
                </button>
                <button onclick="downloadPlanPDF()" style="flex:2; padding:13px; border-radius:10px; border:none;
                                   background:linear-gradient(135deg,#f59e0b,#d97706);
                                   color:#fff; font-size:13px; font-weight:600;
                                   cursor:pointer; font-family:inherit;
                                   box-shadow:0 4px 12px rgba(245,158,11,.35);">
                    <i class="fas fa-download" style="margin-right:7px;"></i>
                    Download Receipt (PDF)
                </button>
            </div>

            @else

            <!-- No Plan -->
            <div style="text-align:center; padding:16px 0 28px;">
                <div style="width:80px; height:80px; border-radius:50%; background:#fef3c7;
                                display:flex; align-items:center; justify-content:center;
                                margin:0 auto 18px;">
                    <i class="fas fa-crown" style="font-size:30px; color:#f59e0b;"></i>
                </div>
                <h3 style="font-size:18px; font-weight:700; color:#111827; margin:0 0 8px;">
                    No Active Plan
                </h3>
                <p style="font-size:13px; color:#9ca3af; margin:0 0 6px;">
                    You don't have an active subscription.
                </p>
                <p style="font-size:13px; color:#9ca3af; margin:0 0 28px;">
                    Subscribe now to unlock all premium features.
                </p>
                <div style="display:flex; gap:10px; justify-content:center;">
                    <button onclick="closePlanModal()" style="padding:12px 22px; border-radius:10px;
                                       border:1px solid #e5e7eb; background:transparent;
                                       color:#6b7280; font-size:13px; cursor:pointer; font-family:inherit;">
                        Cancel
                    </button>
                    <a href="{{ route('subscription.index') }}" style="padding:12px 28px; border-radius:10px;
                                  background:linear-gradient(135deg,#f59e0b,#d97706);
                                  color:#fff; font-size:13px; font-weight:600;
                                  text-decoration:none; box-shadow:0 4px 12px rgba(245,158,11,.3);">
                        View Plans
                    </a>
                </div>
            </div>

            @endif

        </div>
    </div>
</div>

<style>
    @keyframes pulse-green {

        0%,
        100% {
            box-shadow: 0 0 0 0 rgba(34, 197, 94, .4);
        }

        50% {
            box-shadow: 0 0 0 6px rgba(34, 197, 94, 0);
        }
    }
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script>
    function openPlanModal() {
        document.getElementById('planModal').style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }

    function closePlanModal() {
        document.getElementById('planModal').style.display = 'none';
        document.body.style.overflow = '';
    }

    function downloadPlanPDF() {
        const {
            jsPDF
        } = window.jspdf;
        const doc = new jsPDF({
            unit: 'mm',
            format: 'a4'
        });
        const W = doc.internal.pageSize.getWidth();

        // Amber header
        doc.setFillColor(245, 158, 11);
        doc.rect(0, 0, W, 52, 'F');

        doc.setTextColor(255, 255, 255);
        doc.setFontSize(24);
        doc.setFont('helvetica', 'bold');
        doc.text('Subscription Receipt', W / 2, 20, {
            align: 'center'
        });

        doc.setFontSize(11);
        doc.setFont('helvetica', 'normal');
        doc.text('{{ config("app.name") }}', W / 2, 30, {
            align: 'center'
        });

        doc.setFontSize(10);
        doc.text('Generated: ' + new Date().toLocaleDateString('en-IN', {
            day: '2-digit',
            month: 'long',
            year: 'numeric',
            hour: '2-digit',
            minute: '2-digit'
        }), W / 2, 42, {
            align: 'center'
        });

        // White card
        doc.setFillColor(255, 255, 255);
        doc.setDrawColor(229, 231, 235);
        doc.roundedRect(12, 60, W - 24, 168, 4, 4, 'FD');

        // Section title
        doc.setFontSize(11);
        doc.setFont('helvetica', 'bold');
        doc.setTextColor(107, 114, 128);
        doc.text('SUBSCRIBER INFORMATION', 20, 73);
        doc.setDrawColor(243, 244, 246);
        doc.line(20, 76, W - 20, 76);

        @auth
        const rows = [
            ['Subscriber Name', '{{ Auth::user()->full_name ?? (Auth::user()->first_name." ".Auth::user()->last_name) }}'],
            ['Email Address', '{{ Auth::user()->email }}'],
            ['Mobile Number', '{{ Auth::user()->country_code }} {{ Auth::user()->mobile_number }}'],
        ];
        @else
        const rows = [
            ['Subscriber Name', ''],
            ['Email Address', ''],
            ['Mobile Number', ''],
        ];
        @endauth

        let y = 86;
        rows.forEach(([label, value], i) => {
            if (i % 2 === 0) {
                doc.setFillColor(249, 250, 251);
                doc.rect(14, y - 5, W - 28, 11, 'F');
            }
            doc.setFontSize(10);
            doc.setFont('helvetica', 'bold');
            doc.setTextColor(107, 114, 128);
            doc.text(label, 20, y);
            doc.setFont('helvetica', 'normal');
            doc.setTextColor(17, 24, 39);
            doc.text(String(value), 100, y);
            y += 12;
        });

        // Plan section title
        y += 4;
        doc.setFontSize(11);
        doc.setFont('helvetica', 'bold');
        doc.setTextColor(107, 114, 128);
        doc.text('PLAN & PAYMENT DETAILS', 20, y);
        doc.setDrawColor(243, 244, 246);
        doc.line(20, y + 3, W - 20, y + 3);
        y += 12;

        const planRows = [
            ['Plan Name', '{{ $planLabel ?? "N/A" }}'],
            ['Amount Paid', '₹{{ isset($sub) ? number_format($sub->amount,2) : "0.00" }}'],
            ['Start Date', '{{ isset($sub) ? \Carbon\Carbon::parse($sub->start_date)->format("d M Y") : "N/A" }}'],
            ['Expiry Date', '{{ isset($sub) ? \Carbon\Carbon::parse($sub->expiry_date)->format("d M Y") : "N/A" }}'],
            ['Days Remaining', '{{ $daysLeft ?? 0 }} days'],
            ['Payment ID', '{{ isset($sub) ? $sub->razorpay_payment_id : "N/A" }}'],
            ['Subscription ID', '{{ isset($sub) ? $sub->razorpay_subscription_id : "N/A" }}'],
            ['Payment Status', 'PAID'],
            ['Subscribed On', '{{ isset($sub) ? \Carbon\Carbon::parse($sub->created_at)->format("d M Y, h:i A") : "N/A" }}'],
        ];

        planRows.forEach(([label, value], i) => {
            if (i % 2 === 0) {
                doc.setFillColor(249, 250, 251);
                doc.rect(14, y - 5, W - 28, 11, 'F');
            }
            doc.setFontSize(10);
            doc.setFont('helvetica', 'bold');
            doc.setTextColor(107, 114, 128);
            doc.text(label, 20, y);
            doc.setFont('helvetica', 'normal');
            doc.setTextColor(17, 24, 39);

            // Wrap long values (payment/order IDs)
            const lines = doc.splitTextToSize(String(value), 80);
            doc.text(lines, 100, y);
            y += 12;
        });

        // Footer
        doc.setFillColor(245, 158, 11);
        doc.rect(0, 272, W, 25, 'F');
        doc.setTextColor(255, 255, 255);
        doc.setFontSize(9);
        doc.setFont('helvetica', 'bold');
        doc.text('{{ config("app.name") }}', W / 2, 281, {
            align: 'center'
        });
        doc.setFont('helvetica', 'normal');
        doc.text('This is a system-generated receipt and does not require a signature.', W / 2, 288, {
            align: 'center'
        });
        doc.text('{{ config("app.url") }}', W / 2, 294, {
            align: 'center'
        });

        doc.save('subscription-receipt-{{ isset($sub) ? $sub->razorpay_payment_id : "receipt" }}.pdf');
    }
</script>

<style>
    .profile-dropdown {
        position: relative;
        display: inline-block;
    }

    .profile-btn {
        background: transparent;
        border: none;
        cursor: pointer;
        padding: 0;
    }

    .profile-menu {
        position: absolute;
        top: 45px;
        right: 0;
        min-width: 180px;
        background: #fff;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 10px 25px rgba(0, 0, 0, .15);
        display: none;
        z-index: 9999;
    }

    .profile-dropdown:hover .profile-menu {
        display: block;
    }

    .dropdown-item {
        display: block;
        padding: 12px 15px;
        color: #333;
        text-decoration: none;
        font-size: 14px;
        transition: .3s;
    }

    .dropdown-item:hover {
        background: #f5f5f5;
    }
</style>