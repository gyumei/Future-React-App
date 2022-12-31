import React from "react";
import { Inertia } from "@inertiajs/inertia";
import Authenticated from "@/Layouts/AuthenticatedLayout";
import { Link } from '@inertiajs/inertia-react';

const Follow_display = (props) => {
    const { follows } = props; // 追加

    return (
            <body>
            {
                (
                   ()=> {
                        if(follows === null) {
                            return (
                                <div class="title-box3">
                                    <p>あなたがフォローしている人はいません</p>
                                </div>
                            );
                        } else {
                        return (
                        <div class="box8">
                            <div class="title-box3">
                                <div class="title-box3-title"><p>あなたがフォロー中の人の一覧です</p></div>
                                { follows.map((follow) => (
                                <div key={follow.id}>
                                    <div class="follow_name"><p><Link href={`/future/otherpage/${follow.id}`}>{ follow.name }</Link></p></div>
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
                <div class="back">
                    <Link href={`/future`}>戻る</Link>
                </div>
            </body>
    );
}

export default Follow_display;