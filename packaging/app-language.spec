
Name: app-language
Epoch: 1
Version: 2.3.27
Release: 1%{dist}
Summary: Language
License: GPLv3
Group: ClearOS/Apps
Source: %{name}-%{version}.tar.gz
Buildarch: noarch
Requires: %{name}-core = 1:%{version}-%{release}
Requires: app-base

%description
This software is provided in many different languages.  Use this tool to set the default language for the system.

%package core
Summary: Language - Core
License: LGPLv3
Group: ClearOS/Libraries
Requires: app-base-core
Requires: clearos-framework >= 7.3.6
Requires: grub2
Requires: google-noto-kufi-arabic-fonts
Requires: google-noto-sans-armenian-fonts
Requires: google-noto-sans-bengali-fonts
Requires: google-noto-sans-bengali-ui-fonts
Requires: google-noto-sans-devanagari-fonts
Requires: google-noto-sans-devanagari-ui-fonts
Requires: google-noto-sans-georgian-fonts
Requires: google-noto-sans-gujarati-fonts
Requires: google-noto-sans-gujarati-ui-fonts
Requires: google-noto-sans-gurmukhi-fonts
Requires: google-noto-sans-gurmukhi-ui-fonts
Requires: google-noto-sans-hebrew-fonts
Requires: google-noto-sans-kannada-fonts
Requires: google-noto-sans-kannada-ui-fonts
Requires: google-noto-sans-khmer-fonts
Requires: google-noto-sans-khmer-ui-fonts
Requires: google-noto-sans-korean-fonts
Requires: google-noto-sans-lao-fonts
Requires: google-noto-sans-lao-ui-fonts
Requires: google-noto-sans-malayalam-fonts
Requires: google-noto-sans-malayalam-ui-fonts
Requires: google-noto-sans-myanmar-fonts
Requires: google-noto-sans-myanmar-ui-fonts
Requires: google-noto-sans-simplified-chinese-fonts
Requires: google-noto-sans-sinhala-fonts
Requires: google-noto-sans-tamil-fonts
Requires: google-noto-sans-tamil-ui-fonts
Requires: google-noto-sans-telugu-fonts
Requires: google-noto-sans-telugu-ui-fonts
Requires: google-noto-sans-thai-fonts
Requires: google-noto-sans-thai-ui-fonts
Requires: google-noto-serif-armenian-fonts
Requires: google-noto-serif-georgian-fonts
Requires: google-noto-serif-khmer-fonts
Requires: google-noto-serif-lao-fonts
Requires: google-noto-serif-thai-fonts
Requires: google-noto-serif-fonts

%description core
This software is provided in many different languages.  Use this tool to set the default language for the system.

This package provides the core API and libraries.

%prep
%setup -q
%build

%install
mkdir -p -m 755 %{buildroot}/usr/clearos/apps/language
cp -r * %{buildroot}/usr/clearos/apps/language/

install -d -m 0755 %{buildroot}/var/clearos/language
install -D -m 0644 packaging/language.conf %{buildroot}/etc/clearos/language.conf
install -D -m 0755 packaging/onboot-event %{buildroot}/var/clearos/events/onboot/language

%post
logger -p local6.notice -t installer 'app-language - installing'

%post core
logger -p local6.notice -t installer 'app-language-core - installing'

if [ $1 -eq 1 ]; then
    [ -x /usr/clearos/apps/language/deploy/install ] && /usr/clearos/apps/language/deploy/install
fi

[ -x /usr/clearos/apps/language/deploy/upgrade ] && /usr/clearos/apps/language/deploy/upgrade

exit 0

%preun
if [ $1 -eq 0 ]; then
    logger -p local6.notice -t installer 'app-language - uninstalling'
fi

%preun core
if [ $1 -eq 0 ]; then
    logger -p local6.notice -t installer 'app-language-core - uninstalling'
    [ -x /usr/clearos/apps/language/deploy/uninstall ] && /usr/clearos/apps/language/deploy/uninstall
fi

exit 0

%files
%defattr(-,root,root)
/usr/clearos/apps/language/controllers
/usr/clearos/apps/language/htdocs
/usr/clearos/apps/language/views

%files core
%defattr(-,root,root)
%exclude /usr/clearos/apps/language/packaging
%exclude /usr/clearos/apps/language/unify.json
%dir /usr/clearos/apps/language
%dir /var/clearos/language
/usr/clearos/apps/language/deploy
/usr/clearos/apps/language/language
/usr/clearos/apps/language/libraries
%config(noreplace) /etc/clearos/language.conf
/var/clearos/events/onboot/language
