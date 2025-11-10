document.addEventListener('DOMContentLoaded', async () => {
    let cardData = {};
    const publicApi = document.querySelector('meta[name="public-card-url"]').getAttribute('content');
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const storagePath = document.querySelector('meta[name="storage-path"]').getAttribute('content');
    const defaultAvatar = document.querySelector('meta[name="default-avatar"]').getAttribute('content');
    const splashScreen = document.getElementById('splashScreen');
    const loadingState = document.getElementById('loadingState');
    const cardContent = document.getElementById('cardContent');
    const errorState = document.getElementById('errorState');

    // Hide splash screen after minimum display time
    function hideSplash() {
        setTimeout(() => {
            splashScreen.classList.add('hide');
            setTimeout(() => {
                splashScreen.style.display = 'none';
            }, 500);
        }, 1500); // Show splash for at least 1.5 seconds
    }

    // ================== Load Card Data ==================
    async function loadCardData() {
        try {
            const response = await fetch(publicApi, {
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                }
            });

            const result = await response.json();

            if (result.success && result.data) {
                cardData = {
                    name: result.data.name || 'Your Name',
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
                return true;
            } else if (result.status === 'inactive') {
                // Card is inactive - show message
                showError('This card is inactive. User registration required.');
                return false;
            } else {
                showError();
                return false;
            }
        } catch (error) {
            console.error('Error loading data:', error);
            showError();
            return false;
        }
    }

    // ================== Show Error State ==================
    function showError(message = null) {
        loadingState.classList.add('hidden');
        cardContent.classList.add('hidden');
        errorState.classList.remove('hidden');

        if (message) {
            errorState.querySelector('p').textContent = message;
        }
    }

    // ================== Show Card Content ==================
    function showCard() {
        loadingState.classList.add('hidden');
        errorState.classList.add('hidden');
        cardContent.classList.remove('hidden');
    }

    // ================== Initialize Card ==================
    async function initCard() {
        const success = await loadCardData();

        if (success) {
            document.getElementById('fullName').textContent = cardData.name;
            document.getElementById('title').textContent = cardData.title;
            document.getElementById('profilePhoto').src = cardData.photo;
            renderSocialLinks();
            renderContactInfo();
            showCard();
        }
    }

    // ================== Render Social Links ==================
    function renderSocialLinks() {
        const container = document.getElementById('socialLinks');
        container.innerHTML = '';

        const icons = {
            facebook: { i: 'fab fa-facebook', c: 'text-blue-600' },
            instagram: { i: 'fab fa-instagram', c: 'text-pink-600' },
            linkedin: { i: 'fab fa-linkedin', c: 'text-blue-700' },
            twitter: { i: 'fab fa-twitter', c: 'text-blue-400' },
            youtube: { i: 'fab fa-youtube', c: 'text-red-600' },
            tiktok: { i: 'fab fa-tiktok', c: 'text-black' },
            pinterest: { i: 'fab fa-pinterest', c: 'text-red-500' },
            snapchat: { i: 'fab fa-snapchat', c: 'text-yellow-400' },
            github: { i: 'fab fa-github', c: 'text-gray-800' }
        };

        Object.entries(cardData.social).forEach(([key, url]) => {
            if (url && url.trim() !== '') {
                const a = document.createElement('a');
                a.href = url;
                a.target = '_blank';
                a.rel = 'noopener noreferrer';
                a.className = 'flex items-center justify-center w-12 h-12 transition transform bg-gray-100 rounded-xl hover:bg-gray-200 hover:scale-105';
                a.innerHTML = `<i class="${icons[key].i} ${icons[key].c} text-3xl"></i>`;
                container.appendChild(a);
            }
        });

        // Hide section if no social links
        if (container.children.length === 0) {
            container.parentElement.style.display = 'none';
        }
    }

    // ================== Render Contact Info ==================
    function renderContactInfo() {
        const container = document.getElementById('contactInfo');
        container.innerHTML = '';

        const items = [
            {
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
                href: cardData.contact.whatsapp ? `https://wa.me/${cardData.contact.whatsapp.replace(/[^0-9]/g, '')}` : ''
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
                href: cardData.contact.website ? (cardData.contact.website.startsWith('http') ? cardData.contact.website : `https://${cardData.contact.website}`) : ''
            },
            {
                k: 'address',
                i: 'fas fa-map-marker-alt',
                l: cardData.contact.address,
                href: cardData.contact.address ? `https://www.google.com/maps/search/?api=1&query=${encodeURIComponent(cardData.contact.address)}` : ''
            },
        ];

        items.forEach((item, i) => {
            if (item.l && item.l.trim() !== '') {
                const div = document.createElement('div');
                div.className = `flex items-center justify-between py-4 ${i < items.length - 1 ? 'border-b border-gray-200' : ''} hover:bg-gray-50 transition cursor-pointer rounded-lg px-3`;

                let innerWrapper;
                if (item.href) {
                    innerWrapper = document.createElement('a');
                    innerWrapper.href = item.href;
                    innerWrapper.target = '_blank';
                    innerWrapper.rel = 'noopener noreferrer';
                    innerWrapper.className = 'flex items-center flex-1 gap-4';
                } else {
                    innerWrapper = document.createElement('div');
                    innerWrapper.className = 'flex items-center flex-1 gap-4';
                }

                innerWrapper.innerHTML = `
                    <div class="flex items-center justify-center w-10 h-10">
                        <i class="${item.i} ${item.c || 'text-gray-600'} text-xl"></i>
                    </div>
                    <span class="font-medium text-gray-900">${item.k === 'whatsapp' ? item.l : item.l}</span>
                `;

                div.appendChild(innerWrapper);
                if (item.href) {
                    div.innerHTML += `<i class="text-gray-400 fas fa-chevron-right"></i>`;
                }
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
ADR:;;${cardData.contact.address};;;;
URL:${cardData.contact.website}
END:VCARD`;

        const blob = new Blob([vCard], { type: 'text/vcard' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = `${cardData.name.replace(/\s+/g, '_')}.vcf`;
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
            url: window.location.href
        };

        if (navigator.share) {
            navigator.share(shareData).catch(err => {
                console.log('Error sharing:', err);
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
            navigator.clipboard.writeText(shareUrl).then(() => {
                alert('Link copied to clipboard!');
            }).catch(() => {
                showShareDialog(shareUrl);
            });
        } else {
            showShareDialog(shareUrl);
        }
    }

    function showShareDialog(url) {
        const dialog = confirm(`Share this link:\n\n${url}\n\nPress OK to copy`);
        if (dialog) {
            const textArea = document.createElement('textarea');
            textArea.value = url;
            document.body.appendChild(textArea);
            textArea.select();
            document.execCommand('copy');
            document.body.removeChild(textArea);
            alert('Link copied!');
        }
    }

    // ================== Initialize ==================
    initCard();

    // ================== Expose functions globally ==================
    window.shareCard = shareCard;
    window.saveContact = saveContact;
});
