import React from "react";
import { Inertia } from "@inertiajs/inertia";
import Authenticated from "@/Layouts/AuthenticatedLayout";
import { Link } from '@inertiajs/inertia-react';
import './css/Otherpage.css';
import './css/All.css';

const Otherpage = (props) => {
    const { otherpage } = props; 
    const { profile } = props; 
    const { confirmation } = props; 
    
    return (
        <body>
            <div class="otherpage-box">
            <title>{ otherpage.name }さんのページです</title>
            <h1>{ otherpage.name }さんのページです</h1>
            <div className="otherpage-content">
            {
                (
                   ()=> {
                        if(!confirmation) {
                            return (
                                <div className="otherpage-button">
                                    <Link href={`/future/follow/${otherpage.id}`}>フォロー</Link>
                                </div>
                            );
                        } else {
                            return (
                                 <div className="otherpage-button">
                                    <Link href={`/future/follow_delete/${otherpage.id}`}>フォロー解除</Link>
                                </div>
                            );
                        }
                        }
                    )
                ()
            }
            {
                (
                   ()=> {
                        if(profile == null) {
                            return (
                                 <div className="otherpage-profile">
                                    <p>自己紹介文はありませんでした</p>
                                 </div>
                            );
                        } else {
                        return (
                                <div className="otherpage-profile">
                                    <p>自己紹介文</p>
                                    <p>{ profile.content }</p>
                                </div>
                            );
                        }
                        }
                    )
                ()
            }
            </div>
            <div className="back-to-index">
	               <Link href={`/future`}>戻る</Link>
	           </div>
            </div>
        </body>
        );
}

export default Otherpage;