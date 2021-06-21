<?php
namespace console\controllers;

use common\rbac\rules\AuthorRule;
use yii\helpers\Console;
use yii\console\Controller;
use Yii;

/**
 * Bizning dasturimiz uchun asosiy RBAC avtorizatsiya ma'lumotlarini yaratadi.
 * -----------------------------------------------------------------------------
 * 3 ta rolni yaratadi:
 *
 * - theCreator : siz, ushbu saytni ishlab chiquvchisi (super admin)
 * - admin      : sizning to'g'ridan-to'g'ri mijozlaringiz, ushbu sayt ma'murlari (admin)
 * - employee   : ushbu sayt / kompaniyaning xodimi, bu admindan keyingi huquq
 *
 *
 * 1 ta qoida yaratadi:
 *
 * - AuthorRule: xodimlar + rollariga o'z tarkibini yangilashga imkon beradi (sukut bo'yicha foydalanilmaydi)
 */
class RbacController extends Controller
{
    /**
     * RBAC avtorizatsiya ma'lumotlarini ishga tushiradi.
     */
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        //---------- Qoidalar ----------//

        // qoidani qo'shing (sukut bo'yicha ishlatilmaydi)
        $rule = new AuthorRule;
        $auth->add($rule);

        //---------- ROLLAR ----------//

        // "employee" rolini qo'shing va ushbu rolni bering:
        // Bu huquq admindan bitta pastdagi huquq
//        $employee = $auth->createRole('employee');
//        $employee->description = 'Ushbu sayt / kompaniyaning admindan past huquqlarga ega bo\'lgan xodimi';
//        $auth->add($employee);

        // "admin" rolini qo'shing va ushbu rolni bering:
        // manageUsers, updateArticle adn deleteArticle ruxsatlari, shuningdek, xodimning roli.
        $admin = $auth->createRole('admin');
        $admin->description = 'Ushbu dastur ma\'muri (Admin)';
        $auth->add($admin);
//        $auth->addChild($admin, $employee);

        // "theCreator" rolini qo'shing (bu siz :))
        // Siz admin qila oladigan hamma narsani qilishingiz mumkin va yana ko'p narsalar (agar shunday qaror qilsangiz)
        $theCreator = $auth->createRole('theCreator');
        $theCreator->description = 'Siz sayt yaratuvchisi admindan ham yuqori huquq';
        $auth->add($theCreator); 
        $auth->addChild($theCreator, $admin);

        if ($auth) {
            $this->stdout("\nRbac avtorizatsiya ma'lumotlari muvaffaqiyatli o'rnatildi.\n", Console::FG_GREEN);
        }
    }
}