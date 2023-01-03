import React from "react";
import { Inertia } from "@inertiajs/inertia";
import Authenticated from "@/Layouts/AuthenticatedLayout";
import { Link } from '@inertiajs/inertia-react';
import './css/Share.css';

const Share = (props) => {

const { futures } = props;

return (
            <body>
            {
                (
                   ()=> {
                        if(futures === null) {
                            
                        } else {
                        return (
                    <div className="content">
                    <div className="box5">
                        { futures.map((future) => (
                        <div key={future.id}>
                            {future.number == 1 ? (
                            <div className="sample_box_title">
                                <div className="theme">個人のタイムカプセル</div>
                                <p className="data_text">{ future.user }さんが{ future.year }に向けて投稿した思い出です。</p>
                            </div>
                            ):(
                            <div className="sample_box_title">
                                <div className="data_text">
                                    <Link href={`/future/ownpage/${future.id}`} >タイムカプセル</Link>
                                </div>
                                <p>{ future.user }さんが{ future.year }に向けて投稿した思い出です。</p>
                            </div>
                            )
                            }
                        </div>
                        )
                        )
                        }
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

export default Share;