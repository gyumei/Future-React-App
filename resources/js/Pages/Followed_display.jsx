import React from "react";
import { Inertia } from "@inertiajs/inertia";
import Authenticated from "@/Layouts/AuthenticatedLayout";
import { Link } from '@inertiajs/inertia-react';
import './css/Follow_display.css';
import './css/All.css';

const Followed_display = (props) => {
    const { follows } = props; 
    
    return (
        <body>
            <div className="follow-box">
            {
                (
                   ()=> {
                   {/* フォロワーがいるかどうかでの */}
                        if(follows === null) {
                            return (
                                <div className="follow-title-box">
                                    <div className="follow-box-name"><p>あなのフォロワーの一覧です</p></div>
                                    <p>あなたをフォローしている人はいません</p>
                                </div>
                            );
                        } else {
                           return (
                            <div className="follow-title-box">
                                <div className="follow-box-name"><p>あなのフォロワーの一覧です</p></div>
                                { follows.map((follow) => (
                                　　<div key={follow.id}>
                                        <div className="follow_name"><p><Link href={`/future/otherpage/${follow.id}`}>{ follow.name }</Link></p></div>
                                    </div>
                                )) }
                            </div>
                         )
                        }
                        }
                    )
                ()
            }
                <div className="back-to-index">
	               <Link href={`/future`}>戻る</Link>
	           </div>
            </div>
        </body>
        );
}

export default Followed_display;