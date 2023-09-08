# مشروع منصة افلام

## Installation 

> [!NOTE]
> DB_user = `root` && DB_pass = ` `  (nothing) as default you can change it from config file in project
>
 1. قم بتنفيذ سكريبت DB.sql من خلال php myadmin وسيتم انشاء قاعدة
    البيانات movies-website واضافة الجداول والحقول تلقائيا
2. تاكد من تشغيل المشروع من مسار public
___
## قاعدة البيانات
### تحتوي قاعدة البيانات على جدولين

####  الجدول الاول جدول الافلام
يحتوي على حقول

 1. اسم الفيلم

 2. مسار تخزين الفيلم


 3. مسار تخزين صورة الغلاف


 4. الوصف  قصير للفيلم

 5. الوصف كاملا
___
#### الجدول الثاني جدول الادمنز
يحتوي على 

 1. حقل اسم المستخدم

 2. كلمة السر

___
### كيفيه عمل الموقع
يقوم المستخدم العادي بالدخول الى الموقع وسيتم عرض جميع الافلام المتاحه للعرض
ومن ثم يقوم بالضغط على احد الفيديوهات وسيتم عرض الفيلم له للمشاهدة
___
#### كيف يمكن اضافة فيلم جديد للموقع
>> [!NOTE]
> يمكن للمسؤول فقط اضافه افلام جديدة
يجب على المسؤول التوجه لصفحه تسجيل الدخول لاثبات هويه المسؤول
>> `/admin/login`
> 
عند تسجيل الدخول بنجاح سيتم اجراء تغييرات على مظهر الموقع بحيث سيتم اتاحه خيارات على الناڤ بار
منها زر لاضافة  فيلم جديد  وزر لتسجيل الخروج 

عند الضغط على اضافة فيلم سيتم اعادة توجيهه الى صفحة اضافة فيلم جديد
فيقوم المسؤوول بتعبئة بيانات الفيلم مثل الاسم والوصف المختصر والوصف الكامل وتحديد ملف الفيديو من جهاز الكمبيوتر لرفعه على السيرفر وايضا تحديد ملف صورة الغلاف للفيديو 
ومن ثم يقوم بالضغط على زر الحفظ وسيتم رفع فيلم جديد على المنصة

> [!WARNING]
> في حالة لم يقوم المسؤول بتسجيل الدخول فسيتم اعادة توجيهه تلقائيا الى صفحة تسجيل الدخول
> 
#### كيف يمكن حذف فيلم من الموقع 
لحذف الفيديو يتوجب على المسؤول تسجيل الدخول  
>/admin/login
>
ومن ثم يقوم المسؤول باستعراض الافلام والدخول لصفحة مشاهدة الفيلم كاي مستخدم اخر 
سيظهرله  زر الحذف في صفحة المشاهده 
___
> [!NOTE]
> ملاحظات :
>  1. المشروع بالكامل oop
> 2. الهدف من المشروع تعلم هيكلية mvc
> 3. تعلم كيفية التعامل مع الملفات ( الرفع والحذف )
> 4. التعامل مع السيشن والصلاحيات
> 5. تم انشاء مودل يتعامل مع قواعد البيانات وجعله قابل لاعادة الاستخدام بشكل سهل وبسيط
> 6. عند تشغيل المشروع لاول مرة لا تتوفر اي افلام داخل الموقع ويجب تسجيل الدخول  `\admin\login` كادمن داخل الموقع ورفع افلام جديدة
> 7. يوجد حساب ادمن مسبق مخزن في قواعد البيانات 
> > username `anwar`
> > 
> >  password `123`
> >  
> 8. يتم تخزين ملفات الفيديوهات والصور داخل ملفات السيرفر وليس داخل قاعدة البيانات بينما يتم تخزين اسم وامتداد الملف فقط داخل قاعدة
> البيانات
> 9. تم التركيز على معالجة الاخطاء في المدخلات عند الاضافه والحذف
