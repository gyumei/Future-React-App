import React from "react";
import { Inertia } from "@inertiajs/inertia";
import Authenticated from "@/Layouts/AuthenticatedLayout";
import { Link } from '@inertiajs/inertia-react';
<<<<<<< HEAD
=======
import './css/Followed_display.css';
>>>>>>> 3759a0a (react導入後初めてのコミット)

const Followed_display = (props) => {
    const { follows } = props; 
    
    return (

            <body>
            
            {
                (
                   ()=> {
                        if(follows === null) {
                            return (
                                <div className="title-box3">
                                    <p>あなたをフォローしている人はいません</p>
                                    <x-delete></x-delete>
                                </div>
                            );
                        } else {
                           return (
                        <div className="box8">
                            <div className="title-box3">
                                <div className="title-box3-title"><p>あなのフォロワーの一覧です</p></div>
                                { follows.map((follow) => (
                                　　<div key={follow.id}>
                                        <div className="follow_name"><p><Link href={`/future/otherpage/${follow.id}`}>{ follow.name }</Link></p></div>
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
                <div className="button019">
	               <Link href={`/future`}>戻る</Link>
	           </div>
            </body>
        );
}

export default Followed_display;