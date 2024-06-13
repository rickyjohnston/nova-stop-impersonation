<style>
    #stop-impersonation {
        position: fixed;
        top: 1rem;
        left: 1rem;
        z-index: 50;
        display: flex;
        align-items: center;
        opacity: 0.6;
        transition: all 0.2s;
        cursor: pointer;
        overflow: hidden;
        max-width: 275px;
        width: 100%;
        border-top-left-radius: 30px;
        border-bottom-left-radius: 30px;

        .thumbprint-wrapper {
            background: #fff;
            border-radius: 100%;
        }

        svg {
            margin: 20px;
            width: 1.5rem;
            height: 1.5rem;
        }

        .action-wrapper {
            position: absolute;
            background: #fff;
            padding: 1rem;
            padding-left: 2rem;
            left: -400px;
            z-index: -1;
            border-top-right-radius: 60px;
            border-bottom-right-radius: 60px;
            transition: all 0.125s;
        }

        &:hover {
            opacity: 1;

            .thumbprint-wrapper {
                box-shadow: none;
            }

            .action-wrapper {
                left: 2rem;
            }
        }

        .stop-impersonating {
            display: block;
            width: 100%;
            text-align: left;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            white-space: nowrap;
            font-size: 0.875rem;
            cursor: pointer;
            color: #4b5563;
            background-color: transparent;
            transition: all 0.4s ease-in-out;

            &:hover {
                background-color: #eef3f8;
            }
        }
    }
</style>

<div id="stop-impersonation">
    <div class="action-wrapper">
        <button onclick="stopImpersonating()" class="stop-impersonating">
            {{ __('Stop Impersonating') }}
        </button>
    </div>
    <div class="thumbprint-wrapper">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M7.864 4.243A7.5 7.5 0 0 1 19.5 10.5c0 2.92-.556 5.709-1.568 8.268M5.742 6.364A7.465 7.465 0 0 0 4.5 10.5a7.464 7.464 0 0 1-1.15 3.993m1.989 3.559A11.209 11.209 0 0 0 8.25 10.5a3.75 3.75 0 1 1 7.5 0c0 .527-.021 1.049-.064 1.565M12 10.5a14.94 14.94 0 0 1-3.6 9.75m6.633-4.596a18.666 18.666 0 0 1-2.485 5.33" />
        </svg>
    </div>
</div>

<script>
    function stopImpersonating() {
        fetch('/nova-api/impersonate', {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
        })
        .then(() => {
            window.location.reload();
        });
    }
</script>
