import React from "react";
import { Inertia } from "@inertiajs/inertia";
import Authenticated from "@/Layouts/AuthenticatedLayout";
import { Link } from '@inertiajs/inertia-react'; // 追加
<<<<<<< HEAD
=======
import './css/Outline.css';
>>>>>>> 3759a0a (react導入後初めてのコミット)

const Outline = (props) => {
    
    return (

            
            <body>
<<<<<<< HEAD
            <div class="outline">
                <h1>このアプリの概要</h1>
            </div>
            <div class="sample_box5">
=======
            <div className="outline">
                <h1>このアプリの概要</h1>
            </div>
            <div className="sample_box5">
>>>>>>> 3759a0a (react導入後初めてのコミット)
                このアプリは未来の自分に対してや自分以外の家族や友達に何かメッセージや思い出を埋め込むことで日常の中に非日常を埋め込むことを目的としています。
                画像やテキストを投稿して特定の時期にタイムカプセルを設定することができます。
                また将来の自分に対して何か質問を設定して、将来の自分が答え合わせもすることができます。
            </div>
<<<<<<< HEAD
            <div class="button019">
=======
            <div className="button019">
>>>>>>> 3759a0a (react導入後初めてのコミット)
                <Link href={`/future`}>ホームに戻る</Link>
            </div>
            </body>
        );
}

export default Outline;