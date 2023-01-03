import React from "react";
import { Inertia } from "@inertiajs/inertia";
import Authenticated from "@/Layouts/AuthenticatedLayout";
import { Link } from '@inertiajs/inertia-react';
<<<<<<< HEAD
=======
import './css/Otherpage.css';
>>>>>>> 3759a0a (react導入後初めてのコミット)

const Otherpage = (props) => {
    const { otherpage } = props; 
    const { profile } = props; 
    const { confirmation } = props; 
    
    return (
            <div>
            <title>他人のページです</title>
<<<<<<< HEAD
            <div class="sample_box5">
=======
            <div className="sample_box5">
>>>>>>> 3759a0a (react導入後初めてのコミット)
            <h1>{ otherpage.name }さんのページです</h1>
            
            {
                (
                   ()=> {
                        if(!confirmation) {
                            return (
<<<<<<< HEAD
                                <div class="button004">
=======
                                <div className="button004">
>>>>>>> 3759a0a (react導入後初めてのコミット)
                                    <Link href={`/future/follow/${otherpage.id}`}>フォロー</Link>
                                </div>
                            );
                        } else {
                            return (
<<<<<<< HEAD
                                 <div class="button004">
=======
                                 <div className="button004">
>>>>>>> 3759a0a (react導入後初めてのコミット)
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
<<<<<<< HEAD
=======
            <div className="button019">
	               <Link href={`/future`}>戻る</Link>
	           </div>
>>>>>>> 3759a0a (react導入後初めてのコミット)
            </div>
        );
}

export default Otherpage;