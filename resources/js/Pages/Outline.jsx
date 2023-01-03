import React from "react";
import { Inertia } from "@inertiajs/inertia";
import Authenticated from "@/Layouts/AuthenticatedLayout";
import { Link } from '@inertiajs/inertia-react'; // 追加
import './css/Outline.css';

const Outline = (props) => {
    
    return (

            
            <body>
            <div className="outline">
                <h1>このアプリの概要</h1>
            </div>
            <div className="sample_box5">
                このアプリは未来の自分に対してや自分以外の家族や友達に何かメッセージや思い出を埋め込むことで日常の中に非日常を埋め込むことを目的としています。
                画像やテキストを投稿して特定の時期にタイムカプセルを設定することができます。
                また将来の自分に対して何か質問を設定して、将来の自分が答え合わせもすることができます。
            </div>
            <div className="button019">
                <Link href={`/future`}>ホームに戻る</Link>
            </div>
            </body>
        );
}

export default Outline;