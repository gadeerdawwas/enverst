<x-mail::message>

# 📩 رسالة جديدة من موقع Enverst

مرحبًا فريق Enverst 👋،

تم استلام رسالة جديدة من نموذج التواصل في الموقع، وفيما يلي التفاصيل:

---

👤 **الاسم:** {{ $data['name'] }}

📞 **رقم الهاتف:** {{ $data['phone'] }}

📧 **البريد الإلكتروني:** {{ $data['email'] }}

🛠️ **الخدمة المطلوبة:** {{ $data['service'] ?? 'غير محدد' }}

---

## 💬 الرسالة
{{ $data['message'] }}

---

<x-mail::panel>
⚡ يرجى الرد على العميل في أقرب وقت ممكن.
</x-mail::panel>

<x-mail::button :url="'mailto:' . $data['email']">
رد مباشرة على العميل
</x-mail::button>

---

شكراً،
**فريق Enverst 🚀**
{{ config('app.name') }}

</x-mail::message>
