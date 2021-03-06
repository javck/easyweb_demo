<?php

namespace App\Http\Controllers;

use App\Article;
use App\Cgy;
use App\Element;
use App\Tag;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SiteController extends Controller
{

    protected $checkout;

    public function __construct()
    {

    }

    //首頁(示範頁)
    public function renderDemoPage()
    {
        $item_slider = Element::where('page', 'demo')->where('position', 'slider')->where('enabled', 1)->orderBy('sort', 'asc')->first();
        $item_why_top = Element::where('page', 'demo')->where('position', 'why_top')->where('enabled', 1)->orderBy('sort', 'asc')->first();
        $items_why = Element::where('page', 'demo')->where('position', 'why')->where('enabled', 1)->orderBy('sort', 'asc')->get();
        $item_row1 = Element::where('page', 'demo')->where('position', 'row1')->where('enabled', 1)->orderBy('sort', 'asc')->first();
        $item_row2 = Element::where('page', 'demo')->where('position', 'row2')->where('enabled', 1)->orderBy('sort', 'asc')->first();
        $item_row3 = Element::where('page', 'demo')->where('position', 'row3')->where('enabled', 1)->orderBy('sort', 'asc')->first();
        $items_prices = Element::where('page', 'demo')->where('position', 'prices')->where('enabled', 1)->orderBy('sort', 'asc')->get();
        $items_qna = Element::where('page', 'demo')->where('position', 'qna')->where('enabled', 1)->orderBy('sort', 'asc')->get();
        //$items_comment = Element::where('page','demo')->where('position','comments')->where('enabled',1)->orderBy('sort','asc')->get();
        $item_row4 = Element::where('page', 'demo')->where('position', 'row4')->where('enabled', 1)->orderBy('sort', 'asc')->first();
        $items_row5 = Element::where('page', 'demo')->where('position', 'row5')->where('enabled', 1)->orderBy('sort', 'asc')->get();
        $item_gallery_top = Element::where('page', 'demo')->where('position', 'gallery_top')->where('enabled', 1)->orderBy('sort', 'asc')->first();
        $items_gallery = Element::where('page', 'demo')->where('position', 'gallery')->where('enabled', 1)->orderBy('sort', 'asc')->get();
        $item_how_top = Element::where('page', 'demo')->where('position', 'how_top')->where('enabled', 1)->orderBy('sort', 'asc')->first();
        $items_how = Element::where('page', 'demo')->where('position', 'how')->where('enabled', 1)->orderBy('sort', 'asc')->get();
        $item_call_to_action = Element::where('page', 'demo')->where('position', 'call_to_action')->where('enabled', 1)->orderBy('sort', 'asc')->first();
        $item_media = Element::where('page', 'demo')->where('position', 'media')->where('enabled', 1)->orderBy('sort', 'asc')->first();
        return view('demo', compact('item_slider', 'item_row1', 'item_row2', 'item_row3', 'items_prices', 'items_qna', 'item_row4', 'items_row5', 'items_gallery', 'item_gallery_top', 'item_why_top', 'items_why', 'item_how_top', 'items_how', 'item_call_to_action', 'item_media'));
    }

    //首頁
    public function renderHomePage()
    {
        //如果有指定頁面，轉址到指定頁面
        if (Session::has('from')) {
            $from = Session::get('from');
            Session::forget('from');
            return redirect($from);
        }

        $services = json_decode(setting('constant.services'), true);
        $tags_shop = Tag::where('type', 'shop')->where('enabled', true)->orderBy('sort', 'asc')->limit(3)->get();

        //首頁
        $items_slider = Element::where('page', 'home')->where('position', 'slider')->where('enabled', 1)->orderBy('sort', 'asc')->get();
        $item_slider_top = Element::where('page', 'home')->where('position', 'slider_top')->where('enabled', 1)->orderBy('sort', 'asc')->first();
        $item_spec_pageTop = Element::where('page', 'home')->where('position', 'spec_top')->where('enabled', 1)->orderBy('sort', 'asc')->first();
        $items_spec = Element::where('page', 'home')->where('position', 'spec')->where('enabled', 1)->orderBy('sort', 'asc')->get();
        $item_aboutUs = Element::where('page', 'home')->where('position', 'aboutUs')->where('enabled', 1)->orderBy('sort', 'asc')->first();
        $item_subscribe = Element::where('page', 'home')->where('position', 'subscribe')->where('enabled', 1)->orderBy('sort', 'asc')->first();
        $item_prices_pageTop = Element::where('page', 'home')->where('position', 'prices_pageTop')->where('enabled', 1)->orderBy('sort', 'asc')->first();
        $items_prices = Element::where('page', 'home')->where('position', 'prices')->where('enabled', 1)->orderBy('sort', 'asc')->get();
        $items_fullChar = Element::where('page', 'home')->where('position', 'fullChars')->where('enabled', 1)->orderBy('sort', 'asc')->get();
        $item_callActionSubscribe = Element::where('page', 'home')->where('position', 'callActionSubscribe')->where('enabled', 1)->orderBy('sort', 'asc')->first();
        $cities = json_decode(setting('constant.cities'), true);
        $warehouses = json_decode(setting('constant.warehouses'), true);
        $delivers = json_decode(setting('constant.delivers'), true);

        return view('index', compact('items_slider', 'items_spec', 'item_spec_pageTop', 'item_aboutUs', 'tags_shop', 'item_subscribe', 'items_fullChar', 'item_callActionSubscribe', 'item_prices_pageTop', 'items_prices', 'item_slider_top',
            'warehouses', 'cities', 'delivers'));
    }

    //Q&A頁面
    public function renderQnaPage()
    {
        //$q_modes = Constant::$q_modes;
        $tags = Tag::where('enabled', 1)->where('type', 'like', '%qna%')->orderBy('sort', 'asc')->pluck('title', 'id');
        $items_row1 = Element::where('page', 'qna')->where('position', 'row1')->where('enabled', 1)->orderBy('sort', 'asc')->get();
        $item_callAction = Element::where('page', 'all')->where('position', 'callAction')->where('enabled', 1)->orderBy('sort', 'asc')->first();
        return view('easyweb2::pages.qna', compact('tags', 'items_row1', 'item_callAction'));
    }

    //分類所有文章頁面
    public function renderCgyArticlesPage($cgy_id)
    {
        $articles = Article::where('cgy_id', $cgy_id)->where('status', 'published')->orderBy('sort', 'asc')->orderBy('created_at', 'desc')->simplePaginate(setting('admin.articlesQty'));
        $articleQty = Article::where('cgy_id', $cgy_id)->where('status', 'published')->count();
        return view('easyweb2::pages.news', compact('articles', 'articleQty'));
    }

    //聯絡我們頁面
    public function renderContactUsPage()
    {
        $item_row1_right = Element::where('page', 'contact')->where('position', 'contact_info')->where('enabled', 1)->first();
        $sources = json_decode(setting('constant.sources'), true);
        $services = json_decode(setting('constant.services'), true);
        return view('contact', compact('services', 'item_row1_right', 'sources'));
    }

    //關於我們
    public function renderVisionPage()
    {
        $item_top = Element::where('page', 'vision')->where('position', 'top')->where('enabled', 1)->first();
        $items_slider = Element::where('page', 'vision')->where('position', 'slider')->where('enabled', 1)->orderBy('sort', 'asc')->get();
        $item_content = Element::where('page', 'vision')->where('position', 'content')->where('enabled', 1)->first();
        $pageView = 'VisionPageView';
        return view('easyweb2::pages.about.vision', compact('item_content', 'item_top', 'items_slider', 'pageView'));
    }

    //商店示範頁面
    public function renderShopPage()
    {
        return view('shop');
    }

    //最新消息頁面
    public function renderNewsPage()
    {
        Carbon::setLocale('zh-tw'); //設定Carbon的本地化
        //$top = Element::where('page','news')->where('position','top')->where('enabled',1)->first();
        $cgy_news = Cgy::where('title', 'news')->where('enabled', true)->first();
        $articles = Article::where('cgy_id', $cgy_news->id)->where('status', 'published')->orderBy('sort', 'asc')->orderBy('created_at', 'desc')->simplePaginate(5);
        $articleQty = Article::where('cgy_id', $cgy_news->id)->where('status', 'published')->count();
        return view('easyweb2::pages.news', compact('articles', 'articleQty'));
    }

    //商店結帳範例程式============================================================
    public function submitOrder($request)
    {
        // $inputs = $request->all();
        // $order = Order::create($inputs);
        // $pre_ary_items = explode(',' ,$inputs['items']);
        // foreach ($pre_ary_items as $value){
        //     $ary_item = explode('=',$value);
        //     Order_Item::create(['order_id' => $order->id , 'item_id' => $ary_item[0] , 'qty' => $ary_item[1]]);
        // }
    }

    //金流相關函式================================================================

    //建立金流單視圖
    public function createAllPayOrderPage(Request $request, $order_id)
    {
        $order = Order::findOrFail($order_id);
        if ($order->getOriginal('status') != 'created') {
            return '此訂單不需付款';
        }

        $payment = setting('admin.payMethod');
        $name = setting('site.title') . '訂單編號:' . $order_id;
        $desc = "";
        $quantity = 0;
        $user_id = 0;
        if (isset($order->owner)) {
            $user_id = $order->owner->id;
        }
        if ($order->getOriginal('type') == 'item') {
            $items = $order->items;
            foreach ($items as $item) {
                if (strlen($desc) > 0) {
                    $desc = $desc . ',';
                }
                $desc = $desc . $item->title . $item->pivot->qty . '個';
                $quantity = $quantity + 1;
            }
        } else if ($order->getOriginal('type') == 'consolidation') {
            $items = Consolidation::where('order_id', $order_id)->get();
            $quantity = $items->count();
            foreach ($items as $consolidation) {
                if (strlen($desc) > 0) {
                    $desc = $desc . ',';
                }
                $desc = $desc . $consolidation->name . $consolidation->qty . '個';
            }
        }

        $amount = $order->subtotal + $order->shipCost;
        $url = null;
        return view('easyweb2::pages.payment.createOrder', compact('order', 'payment', 'name', 'quantity', 'desc', 'amount', 'url', 'user_id', 'items'));
    }

    //建立金流訂單
    public function createPaymentOrder(Request $request)
    {
        $inputs = $request->all();
        $name = $inputs['name'];
        $quantity = $inputs['quantity'];
        $amount = $inputs['amount'];
        $desc = $inputs['desc'];
        $payment = $inputs['payment'];
        $order_id = $inputs['order_id'];
        $url = $inputs['url'];
        $user_id = $inputs['user_id'];
        if ($payment == 'AllPay') {
            PaymentUtil::createAllPayOrder($request, $name, $quantity, $amount, $desc, $order_id, $url, $user_id);
        } else {
            $formData = [
                'UserId' => $user_id, // 用戶ID , Optional
                'ItemDescription' => $desc,
                'ItemName' => $name,
                'TotalAmount' => $amount,
                'PaymentMethod' => 'ALL', // ALL, Credit, ATM, WebATM
            ];
            return $this->checkout->setPostData($formData)->send();
        }

    }

    //寄發請求付款信件或簡訊
    public function paymentRequest(Request $request)
    {
        $order = Order::findOrFail($request->all()['order_id']);
        $user = User::findOrFail($order->owner_id);
        $content = '親愛的客戶您好，' . setting('site.name') . '通知您訂單編號' . $order->id . '需要付款，連結為' . url('payment/create_allpay/' . $order->id);
        //發送簡訊通知
        if (setting('admin.isSendSMS') == 'true') {
            app('smsking')->sendSMS($content, $user->mobile);
        }
        //發送Email通知
        if (isset($user->email)) {
            //發送Email通知給用戶
            $subject = setting('site.name') . '訂單付款通知';
            $beautyMail = app()->make(\Snowfire\Beautymail\Beautymail::class);
            $beautyMail->send('emails.notify', ['title' => $subject, 'content' => $content], function ($m) use ($user, $subject) {
                $m->from(setting('site.service_mail'), setting('site.name'));
                $m->to($user->email, $user->name)->subject($subject);
            });
        }
    }

}
