import React from "react";
import { Inertia } from "@inertiajs/inertia";
import Authenticated from "@/Layouts/AuthenticatedLayout";
import { Link } from '@inertiajs/inertia-react';
<<<<<<< HEAD
=======
import './css/Follow_display.css';
>>>>>>> 3759a0a (react導入後初めてのコミット)

const Follow_display = (props) => {
    const { follows } = props; // 追加

    return (
            <body>
            {
                (
                   ()=> {
                        if(follows === null) {
                            return (
<<<<<<< HEAD
                                <div class="title-box3">
=======
                                <div className="title-box3">
>>>>>>> 3759a0a (react導入後初めてのコミット)
                                    <p>あなたがフォローしている人はいません</p>
                                </div>
                            );
                        } else {
                        return (
<<<<<<< HEAD
                        <div class="box8">
                            <div class="title-box3">
                                <div class="title-box3-title"><p>あなたがフォロー中の人の一覧です</p></div>
                                { follows.map((follow) => (
                                <div key={follow.id}>
                                    <div class="follow_name"><p><Link href={`/future/otherpage/${follow.id}`}>{ follow.name }</Link></p></div>
=======
                        <div className="box8">
                            <div class="title-box3">
                                <div className="title-box3-title"><p>あなたがフォロー中の人の一覧です</p></div>
                                { follows.map((follow) => (
                                <div key={follow.id}>
                                    <div className="follow_name"><p><Link href={`/future/otherpage/${follow.id}`}>{ follow.name }</Link></p></div>
>>>>>>> 3759a0a (react導入後初めてのコミット)
                                </div>
                                )) }
                            </div>
                         </div>
                         )
                        }
                        }
                    )
                ()
            }
<<<<<<< HEAD
                <div class="back">
                    <Link href={`/future`}>戻る</Link>
                </div>
=======
                <div className="button019">
	               <Link href={`/future`}>戻る</Link>
	           </div>
>>>>>>> 3759a0a (react導入後初めてのコミット)
            </body>
    );
}

export default Follow_display;