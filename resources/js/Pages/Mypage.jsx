import React from "react";
import { Inertia } from "@inertiajs/inertia";
import Authenticated from "@/Layouts/AuthenticatedLayout";
import { Link } from '@inertiajs/inertia-react';
import './css/Mypage.css';
import './css/All.css';

const Mypage = (props) => {
    const { mypage } = props; 
    const { profiles } = props; 
    const { me } = props; 
    
    return (
            <body>
               <div className="mypage-box">
                <div className="mypage-box-title">
                    <p>マイページです</p>
                    <p>ようこそ!!{ mypage.name }さん</p>
                    <div className="title-mypage-title">
                    {/* プロファイル文を書いていなかったら上で書いていたら下のリンクを表示する。 */}
                    {
                        (
                            ()=> {
                                if(profiles === null) {
                                    return (
                                        <Link href={`/future/first_setting/${me}`}>[プロフィールを設定する]</Link>
                                    );
                                } else {
                                    return (
                                        <div>
                                            <Link href={`/future/settingregister/put/${me}`}>[編集する]</Link>
                                            <p>{ profiles.content }</p>
                                        </div>
                                    )
                                  }
                                }
                            )
                        ()
                    }
                    </div>
                </div>
                <div className="back-to-index">
                    <Link href={`/future`}>ホームに戻る</Link>
                </div>
                </div>
            </body>
        );
}

export default Mypage;