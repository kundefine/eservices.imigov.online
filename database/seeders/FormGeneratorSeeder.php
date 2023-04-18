<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\FormGenerator;
use Illuminate\Database\Seeder;

class FormGeneratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FormGenerator::insert([
            [
                "admin_id" => Admin::first()->id,
                "uuid" => "7695572f-beab-4843-9d87-6c4f8a06be69",
                "name" => "Domain Form",
                "content" => '[{"id":"d440c397-e63f-480b-8e9b-68607ef6c6f5","title":"Input Field","tagName":"input","name":"domain_name","label":"Domain Name","placeholder":"Ex: xyz.com, xyz.net","value":null,"type":"text","class":null},{"id":"7dd7cdc0-f107-48fc-90a4-a2eadfef5caf","title":"Datepicker","tagName":"datepicker","name":"domain_start_date","label":"Start Date","placeholder":null,"value":null,"type":"text","class":null,"altFormat":"d-m-y","dateFormat":"d-m-y"},{"id":"85ac8a5f-f50e-41df-b01e-3320e225b531","title":"Datepicker","tagName":"datepicker","name":"domain_end_date","label":"End Date","placeholder":null,"value":null,"type":"text","class":null,"altFormat":"d-m-Y","dateFormat":"d-m-Y"}]'
            ],
            [
                "admin_id" => Admin::first()->id,
                "uuid" => "71df6d63-42f0-4586-826c-f28b80a78d25",
                "name" => "Bkash Form",
                "content" => '[{"id":"5afd68f5-1de9-4a13-9923-6697df2049a4","title":"Input Field","tagName":"input","name":"bkash_number","label":"Bkash Number","placeholder":"Ex: +880 XXX XXX XXX","value":null,"type":"text","class":null},{"id":"1db39fc9-3782-4943-97e6-43bac60e0ba1","title":"Input Field","tagName":"input","name":"bkash_transaction_id","label":"Transaction Id","placeholder":"Ex: TF94FG33","value":null,"type":"text","class":null},{"id":"211d7478-53db-44a6-9c6f-357fa3cf1241","title":"Datepicker","tagName":"datepicker","name":"bkash_payment_date","label":"Payment Date","placeholder":"dd\/mm\/yy","value":null,"type":"text","class":null,"altFormat":"d-m-y","dateFormat":"Y-m-d"}]'
            ],
            [
                "admin_id" => Admin::first()->id,
                "uuid" => "273083d9-dd5c-4120-8fe2-156f1f781b2d",
                "name" => "Nogod Form",
                "content" => '[{"id":"8d398062-99ce-43d2-926f-bf197a80d319","title":"Input Field","tagName":"input","name":"nogod_phone","label":"Nogod Phone","placeholder":"Ex: 01675664554","value":null,"type":"text","class":null},{"id":"04eb2a5d-ed17-4ac5-8e3c-ecf50277745a","title":"Input Field","tagName":"input","name":"nogod_transaction_id","label":"Transaction Id","placeholder":"Ex: TF94FG33","value":null,"type":"text","class":null},{"id":"c751741a-d10e-42f0-8611-41566218c787","title":"Datepicker","tagName":"datepicker","name":"payment_date","label":"Payment Date","placeholder":"dd\/mm\/yy","value":null,"type":"text","class":null,"altFormat":"d-m-y","dateFormat":"Y-m-d"}]'
            ],
            [
                "admin_id" => Admin::first()->id,
                "uuid" => "a03952e6-f818-43ef-8946-8578f4b11833",
                "name" => "Bank Form",
                "content" => '[{"id":"39d1b2b6-c273-4854-b66e-22c251fcec39","title":"Select","tagName":"select","name":"bank_name","label":"Bank Name","options":[{"id":"a000bdee-47bc-4652-81e8-ad837ca7c5c7","text":"AB Bank Ltd.","value":"AB Bank Ltd.","isSelected":false},{"id":"fd84bd26-8f7d-4522-9897-f7279a526d05","text":"Agrani Bank","value":"Agrani Bank","isSelected":false},{"id":"89f70926-7ab1-4676-9d47-b02b3fc5600d","text":"Al-Arafah Islami Bank Ltd.","value":"Al-Arafah Islami Bank Ltd.","isSelected":false},{"id":"56ac1345-4a6d-4038-a525-3aa07a47a250","text":"Ansar VDP Unnayan Bank","value":"Ansar VDP Unnayan Bank","isSelected":false},{"id":"b5da6ff8-8ce7-4fb9-904d-75ccee29f4e0","text":"BASIC Bank","value":"BASIC Bank","isSelected":false},{"id":"31afc09a-5028-4de5-96d4-fa193cb635d4","text":"BRAC Bank Ltd.","value":"BRAC Bank Ltd.","isSelected":false},{"id":"c9af4d79-1bfb-4745-9213-3c38e797f520","text":"Bangladesh Commerce Bank Ltd.","value":"Bangladesh Commerce Bank Ltd.","isSelected":false},{"id":"f7b6846f-e113-4574-9daf-418d6d31e3e8","text":"Bangladesh Development Bank","value":"Bangladesh Development Bank","isSelected":false},{"id":"c568b334-b009-46e4-b531-d99d0781483d","text":"Bangladesh Krishi Bank","value":"Bangladesh Krishi Bank","isSelected":false},{"id":"3aa4c54e-8092-423e-979a-9caa8383415d","text":"Bank Al-Falah","value":"Bank Al-Falah","isSelected":false},{"id":"85f46f38-3a21-4152-8d70-c2ef00899cc0","text":"Bank Asia Ltd.","value":"Bank Asia Ltd.","isSelected":false},{"id":"3b06cdd6-ab50-4011-a073-ed8beaecfbe6","text":"CITI Bank NA","value":"CITI Bank NA","isSelected":false},{"id":"ba0d0e0a-f16a-4f07-89ce-141bebaf936f","text":"Commercial Bank of Ceylon","value":"Commercial Bank of Ceylon","isSelected":false},{"id":"afe6a6cb-9b09-444c-a32b-d00e28b0eee7","text":"Community Bank Bangladesh Limited","value":"Community Bank Bangladesh Limited","isSelected":false},{"id":"8d482653-283f-4875-8f4f-4f74664e6358","text":"Dhaka Bank Ltd.","value":"Dhaka Bank Ltd.","isSelected":false},{"id":"def95ea6-8c4e-49cf-a5fd-42010683bc14","text":"EXIM Bank Ltd.","value":"EXIM Bank Ltd.","isSelected":false},{"id":"d457c41e-b74c-4562-94dc-08eaaeb8f13c","text":"Eastern Bank Ltd.","value":"Eastern Bank Ltd.","isSelected":false},{"id":"18465c1e-46ca-4b94-81b6-6b072f953255","text":"First Security Islami Bank Ltd.","value":"First Security Islami Bank Ltd.","isSelected":false},{"id":"aee7a97b-80a1-40cd-8ce5-9eec04688163","text":"Global Islamic Bank Ltd.","value":"Global Islamic Bank Ltd.","isSelected":false},{"id":"2ca8aac9-fd3f-4be3-88fc-a116834005be","text":"Grameen Bank","value":"Grameen Bank","isSelected":false},{"id":"55b5b646-78d5-40d7-ac16-f62fb9fee25d","text":"HSBC","value":"HSBC","isSelected":false},{"id":"46a8745f-49f4-4265-aeb9-a8d5f9c6ecef","text":"Habib Bank Ltd.","value":"Habib Bank Ltd.","isSelected":false},{"id":"8c80acfe-7436-4299-8a23-b17482b0594d","text":"ICB Islamic Bank","value":"ICB Islamic Bank","isSelected":false},{"id":"b43bf3f5-66aa-42b7-901d-07eff69c7bf1","text":"IFIC Bank Ltd.","value":"IFIC Bank Ltd.","isSelected":false},{"id":"54ee83ee-4c86-41f6-8aa7-87ef9492a50b","text":"Dutch Bangla Bank Ltd.","value":"Dutch Bangla Bank Ltd.","isSelected":true}],"class":null,"value":"Dutch Bangla Bank Ltd."},{"id":"b65c734f-a660-4a90-9d82-824efed4aa7b","title":"Input Field","tagName":"input","name":"bank_account_number","label":"Account Number","placeholder":"Ex: 179.567.99.547","value":null,"type":"text","class":null},{"id":"0d2aee84-cc82-4e89-b384-ab87f82ae7ab","title":"Input Field","tagName":"input","name":"bank_branch_name","label":"Branch Name","placeholder":"Ex: Dhaka Branch","value":null,"type":"text","class":null}]'
            ],
        ]);
    }
}
