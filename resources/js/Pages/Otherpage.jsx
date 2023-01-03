import React from "react";
import { Inertia } from "@inertiajs/inertia";
import Authenticated from "@/Layouts/AuthenticatedLayout";
import { Link } from '@inertiajs/inertia-react';
import './css/Otherpage.css';

const Otherpage = (props) => {
    const { otherpage } = props; 
    const { profile } = props; 
    const { confirmation } = props; 
    
    return (
            <div>
            <title>他人のページです</title>
            <div className="sample_box5">
            <h1>{ otherpage.name }さんのページです</h1>
            
            {
                (
                   ()=> {
                        if(!confirmation) {
                            return (
                                <div className="button004">
                                    <Link href={`/future/follow/${otherpage.id}`}>フォロー</Link>
                                </div>
                            );
                        } else {
                            return (
                                 <div className="button004">
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
                                 <div>
                                    <p>自己紹介文はありませんでした</p>
                                 </div>
                            );
                        } else {
                        return (
                                <div>
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
            <div className="button019">
	               <Link href={`/future`}>戻る</Link>
	           </div>
            </div>
        );
}

export default Otherpage;