@component('mail::message')

{{__('Your complaint')}} {{__('number')}} #{{$complaint->id}} {{__('has been sent.')}}
@if (lang() == 'ar')

<table>
<tbody>
<tr>
<td>
<p><strong> المادة 21 من اللائحة التنفيذية لقانون الرقابة المالية والإدارية للدولة: </strong><br>
على الجهاز حفظ الشكوى أو البلاغ في أي من الحالات التالية:</p>                                     
<ul>                                     
<li> سبق فحصها من قبل الجهاز.</li>
<li> سبق الفصل فيها من قبل القضاء.</li>
<li> إذا كانت منظورة أمام القضاء.</li>
<li> لعدم صحتها أو لعدم أهميتها أو لعدم وجود وقائع محددة </li>
</ul>
<p> ويجوز للجهاز تأجيل النظر في الشكوى أو البلاغ حسب مقتضيات العمل.</p>
</td>
</tr>
<tr>
<td><p><strong> ملاحظة: </strong><br>
سيتم التواصل معكم فور الانتهاء من البحث والدراسة متى ما تعلق البلاغ بحق من حقوقكم.</p></td>
</tr>
</tbody>
</table>

@else

<table>                   
<tr>                          
<td>                            
<p><strong> Article 21 of the Regulations for the State Audit Law:</strong><br>
SAI / Oman  shall dismiss any complaint in any of the following cases:</p>                                   
<ul>                                   
<li>Already examined by SAI / Oman.</li>                                   
<li>Already adjudged by judiciary.</li>                                   
<li>Already considered before  courts.</li>                                   
<li>Inaccuracy or insignificance  of matter.</li>                                   
<li>Specified actual incidents unavailable.</li>                                   
</ul>                                   
<p> SAI / Oman may  postpone consideration of the complaint according to exigencies of work.</p>                                   
</td>                                      
</tr>                                      
<tr>                                      
<td><strong> Note:</strong><br>
The  concerned department will contact you once examination of complaint finalized  and whenever the complaint relates to one of your personal rights. </p></td>                                               
</tr>                                               
</table>
@endif
<br>
{{__(config('app.name'))}}

@endcomponent