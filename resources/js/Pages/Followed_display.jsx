import React from "react";
import { Inertia } from "@inertiajs/inertia";
import Authenticated from "@/Layouts/AuthenticatedLayout";
import { Link } from '@inertiajs/inertia-react';

const Followed_display = (props) => {
    const { follows } = props; 
    
    return (

            <body>
            
            {
                (
                   ()=> {
                        if(follows === null) {
                            return (
                                <div class="title-box3">
                                    <p>あなたをフォローしている人はいません</p>
                                    <x-delete></x-delete>
                                </div>
                            );
                        } else {
                           return (
                        <div class="box8">
                            <div class="title-box3">
                                <div class="title-box3-title"><p>あなのフォロワーの一覧です</p></div>
                                { follows.map((follow) => (
                                　　<div key={follow.id}>
                                        <div class="follow_name"><p><Link href={`/future/otherpage/${follow.id}`}>{ follow.name }</Link></p></div>
                                    </div>
                                )) }
                                <x-delete></x-delete>
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

export default Followed_display;